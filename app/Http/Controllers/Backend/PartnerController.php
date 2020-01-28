<?php

namespace App\Http\Controllers\Backend;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $livepartners = Partner::orderBy('created_at', 'desc')->where('is_published','1')->limit(5)->get();
        return view('backend.partners.index')->withPartners($partners)->withLivepartners($livepartners);
    }

    public function create()
    {
        return view('backend.partners.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:90',
        'address' => 'nullable|string|max:500',
        'website' => 'nullable|url'
        ));

        //store the database
        $partner = new Partner;

        $partner->user_id = Auth::user()->id;

        //save our image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/partners/' . $filename);
            Image::make($image)->save($location);

            $partner->logo = $filename;
        }
  
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->address = $request->address;
        $partner->website = $request->website;
        $partner->is_published = $request->has('live');

        $partner->save();

        Session::flash('success', 'The partner image was successfully saved!');
        //redirect to another page
        return redirect()->route('partners.show', $partner->id);
    }


    public function show($id)
    {
         $partner = Partner::find($id);
         return view('backend.partners.show')->withPartner($partner);
    }


    public function publish(Request $request)
    {
        $partner = Partner::find($request->partnerId);
        $partner->is_published = $request->partnerApproved;
        $partner->save();
        return response()->json($partner);
    }


    public function edit($id)
    {
        $partner = Partner::find($id);
        // return the view and pass in the var we previously created
        return view('backend.partners.edit')->withPartner($partner);
    }

    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:90',
        'address' => 'nullable|string|max:500',
        'website' => 'nullable|url'
        ));

        $partner = Partner::find($id);

        $partner->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $partnerDirectory = public_path("images/partners/{$partner->logo}"); // get previous image from folder
            if (File::exists($partnerDirectory)) { // unlink or remove previous image from folder
                unlink($partnerDirectory);
            }
            // take the new image and update it in database and in folder
            $image = $request->file('image');
            $name = time() . '-' . $image->getClientOriginalName();
            $location = public_path('images/partners/' . $name);
            Image::make($image)->save($location);
            $partner->logo = $name;
        }

        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->address = $request->address;
        $partner->website = $request->website;
        $partner->is_published = $request->has('live');

        $partner->save();

        Session::flash('success', 'The partner image was successfully updated!');
        //redirect to another page
        return redirect()->route('partners.show', $partner->id);
    }


    public function destroy($id)
    {
        $partner = Partner::find($id);
        Storage::delete($partner->logo);


        $image_path = 'images/partners/'. $partner->logo;  //directory image path
                     
        if(File::exists($image_path) && $partner->logo != '') {

            File::delete($image_path);
        }


        $partner->delete();

        return response()->json(['success'=> $partner->name. ' was successfully deleted.']);
    }
}
