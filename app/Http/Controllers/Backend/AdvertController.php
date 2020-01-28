<?php

namespace App\Http\Controllers\Backend;

use App\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class AdvertController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin');
    }

    public function index()
    {
        $adverts = Advert::all();
        $liveadverts = Advert::orderBy('created_at', 'desc')->where('is_published','1')->limit(5)->get();
        return view('backend.adverts.index')->withAdverts($adverts)->withLiveadverts($liveadverts);
    }

    public function create()
    {
        return view('backend.adverts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'advert_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string|max:500',
        'url' => 'nullable|string|url|max:255|unique:adverts,url'
        ));

        //store the database
        $advert = new Advert;

        $advert->user_id = Auth::user()->id;

        //save our image
        if ($request->hasFile('advert_image')) {
        $image = $request->file('advert_image');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('images/adverts/' . $filename);
        Image::make($image)->save($location);

        $advert->advert_image = $filename;
        }
  
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->url = $request->url;
        $advert->live = $request->has('is_published');

        $advert->save();

        Session::flash('success', 'The advert image was successfully saved!');
        //redirect to another page
        return redirect()->route('adverts.show', $advert->id);
    }


    public function show($id)
    {
         $advert = Advert::find($id);
         return view('backend.adverts.show')->withAdvert($advert);
    }

    public function publish(Request $request)
    {
        $advert = Advert::find($request->advertId);
        $advert->live = $request->advertApproved;
        $advert->save();
        return response()->json($advert);
    }


    public function edit($id)
    {
        $advert = Advert::find($id);
        // return the view and pass in the var we previously created
        return view('backend.adverts.edit')->withAdvert($advert);
    }

    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
        'advert_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string|max:500',
        'url' => "nullable|string|url|max:255|unique:adverts,url, $id"
        ));

        $advert = Advert::find($id);

        $advert->user_id = Auth::user()->id;

        if ($request->hasFile('advert_image')) {
        $advertsImage = public_path("images/adverts/{$advert->advert_image}"); // get previous image from folder
        if (File::exists($advertsImage)) { // unlink or remove previous image from folder
            unlink($advertsImage);
        }
        // take the new image and update it in database and in folder
        $image = $request->file('advert_image');
        $name = time() . '-' . $image->getClientOriginalName();
        $location = public_path('images/adverts/' . $name);
        Image::make($image)->save($location);
        $advert->advert_image = $name;
        }

        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->url = $request->url;
        $advert->is_published = $request->has('live');

        $advert->save();

        Session::flash('success', 'The advert image was successfully updated!');
        //redirect to another page
        return redirect()->route('adverts.show', $advert->id);
    }


    public function destroy($id)
    {
        $advert = Advert::find($id);
        Storage::delete($advert->image);

        $advert->delete();

        return response()->json(['success'=> $advert->title. ' was successfully deleted.']);
    }
}
