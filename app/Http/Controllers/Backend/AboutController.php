<?php

namespace App\Http\Controllers\Backend;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Counter;


class AboutController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //create a variable and store all abouts in it from the database
        $abouts = About::get();

        //Count approved abouts
        $approvedabouts = About::where('is_published','1')->count();

        //Count not approved abouts
        $notapprovedabouts = About::where('is_published','0')->count();

        //return a view and pass in the above variable
        return view('backend.abouts.index')->withAbouts($abouts)->withApprovedabouts($approvedabouts)->withNotapprovedabouts($notapprovedabouts);
    }

    public function create()
    {
      return view('backend.abouts.create');
    }

    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
          'title'       => 'required|max:255|unique:abouts,title',
          'slug'        => 'required|alpha_dash|min:5|max:255',
          'content'        => 'required'
        ));

        //store the database
        $about = new About;

        // $createSlug = str_slug($request->title, '-');

        $about->user_id = Auth::user()->id;
        $about->title = $request->title;
        $about->slug = $request->slug;
        $about->youtube_video = $request->youtube_video;
        $about->content = Purifier::clean($request->content);

        //save our image
        if ($request->hasFile('file_name')) {
          $image = $request->file('file_name');
          $filename = time(). '.' . $image->getClientOriginalExtension();
          $location = public_path('images/abouts/' . $filename);
          Image::make($image)->save($location);

          $about->file_name = $filename;
        }


        $about->save();

        Session::flash('success', 'The about page was successfully saved!');
        //redirect to another page
        return redirect()->route('abouts.show', $about->id);
        // dd($request->all());
    }

    public function publish(Request $request)
    {
      $about = About::find($request->aboutId);
      $about->is_published = $request->aboutApproved;
      $about->save();
      return response()->json($about);
    }

 
    public function show($id)
    {
      $about = About::find($id);
      return view('backend.abouts.show')->withAbout($about);
    }

  
    public function edit($id)
    {

      // find the about in the database and save as a variable
      $about = About::find($id); 
      if($about)
      {
         // return the view and pass in the var we previously created
         return view('backend.abouts.edit')->withAbout($about);
      }
      else{
         return view('errors.403');
      }

    }

 
    public function update(Request $request, $id)
    {
        
        // Validate the data
        $this->validate($request, array(
          'title'       => 'required|max:90',
          'content'        => 'required'
        ));

        // Save the data to the database
        $about = About::find($id);

        $about->user_id = Auth::user()->id;
        $about->title = $request->input('title');
        $about->youtube_video = $request->youtube_video;
        $about->content  = Purifier::clean($request->input('content'));
        $about->is_published = $request->has('approval');


        if ($request->hasFile('file_name')) {
           $aboutsImage = public_path("images/abouts/{$about->file_name}"); // get previous about image from folder
            if (File::exists($aboutsImage) && $about->file_name != '') { 
                unlink($aboutsImage); // unlink or remove previous about image from folder
            }
          // take the new about image and update it in database and in folder
          $image = $request->file('file_name');
          $filename = time() . '-' . $image->getClientOriginalName();
          $location = public_path('images/abouts/' . $filename);
          Image::make($image)->save($location);
          $about->file_name = $filename;
        }

        $about->save();

        //set flash data with success message
        Session::flash('success', 'This about was successfully updated. ');

        //redirect with flash data to abouts.show
        return redirect()->route('abouts.show', $about->id);
    }

   
    public function destroy($id)
    {
      // $about = About::find($id);

      // $image_path = 'images/abouts/'. $about->file_name;  //directory file path
                   
      // if(File::exists($image_path) && $about->file_name != '') {

      //   File::delete($image_path);
        
      // }

      // $about->delete();

      // return response()->json(['success'=> $about->title. ' was successfully deleted.']);
    }

}
