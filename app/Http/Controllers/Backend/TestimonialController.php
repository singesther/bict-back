<?php

namespace App\Http\Controllers\Backend;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $livetestimonials = Testimonial::orderBy('created_at', 'desc')->where('live','1')->limit(5)->get();
        return view('backend.testimonials.index')->withTestimonials($testimonials)->withLivetestimonials($livetestimonials);
    }

    public function create()
    {
        return view('backend.testimonials.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:12048',
            'creator_name' => 'required|string|max:90',
            'description' => 'required|string|max:500'
        ));

        //store the database
        $testimonial = new Testimonial;

        $testimonial->user_id = Auth::user()->id;

        //save our image
        if ($request->hasFile('file_name')) {
            $file_name = $request->file('file_name');
            $filename = time(). '.' . $file_name->getClientOriginalExtension();
            $location = public_path('images/testimonials/' . $filename);
            Image::make($file_name)->save($location);

            $testimonial->file_name = $filename;
        }
  
        $testimonial->creator_name = $request->creator_name;
        $testimonial->creator_position = $request->creator_position;
        $testimonial->creator_company = $request->creator_company;
        $testimonial->creator_link = $request->creator_link;
        $testimonial->description = $request->description;
        $testimonial->save();

        Session::flash('success', 'The testimonial image was successfully saved!');
        //redirect to another page
        return redirect()->route('testimonials.show', $testimonial->id);
    }


    public function show($id)
    {
         $testimonial = Testimonial::find($id);
         return view('backend.testimonials.show')->withTestimonial($testimonial);
    }


   public function publish(Request $request)
    {
        $testimonial = Testimonial::find($request->testimonialId);
        $testimonial->live = $request->testimonialApproved;
        $testimonial->save();
        return response()->json($testimonial);
    }


    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        // return the view and pass in the var we previously created
        return view('backend.testimonials.edit')->withTestimonial($testimonial);
    }

    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
        'file_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'creator_name' => 'required|string|max:90',
        'description' => 'required|string|max:500'
        ));

        $testimonial = Testimonial::find($id);

        $testimonial->user_id = Auth::user()->id;

        if ($request->hasFile('file_name')) {
            $testimonialDirectory = public_path("images/testimonials/{$testimonial->file_name}"); // get previous file_name from folder
            if (File::exists($testimonialDirectory)) { // unlink or remove previous file_name from folder
                unlink($testimonialDirectory);
            }
            // take the new file_name and update it in database and in folder
            $file_name = $request->file('file_name');
            $name = time() . '-' . $file_name->getClientOriginalName();
            $location = public_path('images/testimonials/' . $name);
            Image::make($file_name)->save($location);
            $testimonial->file_name = $name;
        }

        $testimonial->creator_name = $request->creator_name;
        $testimonial->creator_position = $request->creator_position;
        $testimonial->creator_company = $request->creator_company;
        $testimonial->creator_link = $request->creator_link;
        $testimonial->description = $request->description;
        $testimonial->live = $request->has('live');
        $testimonial->save();

        Session::flash('success', 'The testimonial was successfully updated!');
        //redirect to another page
        return redirect()->route('testimonials.show', $testimonial->id);
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        Storage::delete($testimonial->file_name);


        $file_name_path = 'images/testimonials/'. $testimonial->file_name;  //directory file_name path
                     
        if(File::exists($file_name_path) && $testimonial->file_name != '') {

            File::delete($file_name_path);
        }

        $testimonial->delete();

        return response()->json(['success'=> $testimonial->creator_name. ' was successfully deleted.']);
    }
}
