<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Crime;
use Illuminate\Http\Request;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class CrimeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $crimes = Crime::orderBy('id', 'desc')->get();

        return view('backend.crimes.index')->withCrimes($crimes);
    }

    public function reportedCrimes()
    {
        $crimes = Crime::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.crimes.reportedCrimes')->withCrimes($crimes);
    }

    public function reportedCrime($id)
    {

        $crime = Crime::where('user_id','=',Auth::user()->id)->find($id);
        if($crime)
        {
         return view('backend.crimes.reportedCrime')->withCrime($crime);
        }else{
          return view('errors.403');
        }
    }



    public function create()
    {
      return view('backend.crimes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required|mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:50000',
            'subject' => 'nullable|string|max:90',
            'description' => 'nullable|string'
        ));

        $crime = new Crime;
        $crime->user_id = Auth::user()->id;
        $crime->sender_name = Auth::user()->name;
        $crime->sender_tel = Auth::user()->tel;
        $crime->subject = $request->subject;
        $crime->description = $request->description;
        $crime->location = $request->location;

        //save our image
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $location = public_path().'/images/crimes/';
            $file->move($location, $filename);
            $crime->file_name = $filename;
        }

        $crime->save();
        Session::flash('success', 'The crime was successfully saved!');
        //redirect to another page
        return redirect()->route('reported.crime', $crime->id);
    }


    public function show($id)
    {
        $crime = Crime::find($id);
        if($crime)
        {
         return view('backend.crimes.show')->withCrime($crime);
        }else{
          return view('errors.403');
        }
    }

    public function publish(Request $request)
    {
        $crime = Crime::find($request->crimeId);
        $crime->live = $request->crimeApproved;
        $crime->save();
        return response()->json($crime);
    }


    public function edit($id)
    {
        $crime = Crime::find($id);
        if($crime)
        {
          $programs = Program::all();
          $cats = array();
          foreach ($programs as $program) {
            $cats[$program->id] = $program->title;
          }

          // return the view and pass in the var we previously created
          return view('backend.crimes.edit')->withCrime($crime)
          ->withPrograms($cats);

        }else{
          return view('errors.403');
        }
    }

    public function update(Request $request, $id)
    {

        // Validate the data
        $this->validate($request, array(
          'title'       => 'nullable|max:90',
          'description' => 'nullable|string',
          'file'        => 'image'
        ));


        // Save the data to the database
        $crime = Crime::find($id);

        $crime->program_id = $request->program_id;
        $crime->title = $request->input('title');
        $crime->description  = Purifier::clean($request->input('description'));
        $crime->status = $request->status;
        $crime->date = $request->date;
        $crime->location = $request->location;

        if ($request->hasFile('file')) {
           $crimesImage = public_path("images/crimes/{$crime->file_name}"); // get previous crime image from folder

           $default_image= null;
           $oldFilename = $crime->file_name;
           if($oldFilename == $default_image)
           {
                // take the new crime image and update it in database and in folder
               $file = $request->file('file');
               $filename = time() . '-' . $file->getClientOriginalName();
               $location = public_path().'/images/crimes/';
               $file->move($location, $filename);
               $crime->file_name = $filename;
           }
           else{
                if (File::exists($crimesImage)) { // unlink or remove previous crime image from folder
                    unlink($crimesImage);
                }
               // take the new crime image and update it in database and in folder
               $file = $request->file('file');
               $filename = time() . '-' . $file->getClientOriginalName();
               $location = public_path().'/images/crimes/';
               $file->move($location, $filename);
               $crime->file_name = $filename;
           }
        }

        $crime->save();

        Session::flash('success', 'The crime was successfully updated!');
        //redirect to another page
        return redirect()->route('crimes.show', $crime->id);
    }


    public function destroy($id)
    {
        $crime = Crime::find($id);

        $file_path = 'images/crimes/'. $crime->file_name;  //directory file path
                     
        if(File::exists($file_path) && $crime->file_name != '') {

            File::delete($file_path);
        }


        $crime->delete();

        return response()->json(['success'=> $crime->subject. ' was successfully deleted.']);
    }
}
