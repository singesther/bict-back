<?php

namespace App\Http\Controllers\Backend;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class GalleryController extends Controller
{
    
    public function index()
    {
        $gallery = Gallery::all();
        $livegallery = Gallery::orderBy('created_at', 'desc')->where('is_published','1')->limit(5)->get();
        return view('backend.gallery.index')->withGallery($gallery)->withLivegallery($livegallery);
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:12048',
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string|max:500'
        ));

        //store the database
        $gallery = new Gallery;

        $gallery->user_id = Auth::user()->id;

        //save our image
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time(). '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/gallery/' . $filename);
            Image::make($picture)->save($location);

            $gallery->file_name = $filename;
        }
  
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->save();

        Session::flash('success', 'The gallery image was successfully saved!');
        //redirect to another page
        return redirect()->route('gallery.show', $gallery->id);
    }


    public function show($id)
    {
         $gallery = Gallery::find($id);
         return view('backend.gallery.show')->withGallery($gallery);
    }


   public function publish(Request $request)
    {
        $gallery = Gallery::find($request->galleryId);
        $gallery->is_published = $request->galleryApproved;
        $gallery->save();
        return response()->json($gallery);
    }


    public function edit($id)
    {
        $gallery = Gallery::find($id);
        // return the view and pass in the var we previously created
        return view('backend.gallery.edit')->withGallery($gallery);
    }

    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:32048',
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string|max:500'
        ));

        $gallery = Gallery::find($id);

        $gallery->user_id = Auth::user()->id;

        if ($request->hasFile('picture')) {
            $galleryDirectory = public_path("images/gallery/{$gallery->file_name}"); // get previous picture from folder
            if (File::exists($galleryDirectory)) { // unlink or remove previous picture from folder
                unlink($galleryDirectory);
            }
            // take the new picture and update it in database and in folder
            $picture = $request->file('picture');
            $name = time() . '-' . $picture->getClientOriginalName();
            $location = public_path('images/gallery/' . $name);
            Image::make($picture)->save($location);
            $gallery->file_name = $name;
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->is_published = $request->has('live');
        $gallery->save();

        Session::flash('success', 'The gallery picture was successfully updated!');
        //redirect to another page
        return redirect()->route('gallery.show', $gallery->id);
    }


    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        Storage::delete($gallery->file_name);


        $picture_path = 'images/gallery/'. $gallery->file_name;  //directory picture path
        if(File::exists($picture_path) && $gallery->file_name != '') {

            File::delete($picture_path);
        }

        $gallery->delete();
        return response()->json(['success'=> $gallery->title. ' was successfully deleted.']);
    }
}
