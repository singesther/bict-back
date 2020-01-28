<?php

namespace App\Http\Controllers\Backend;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Counter;

class ProgramController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //create a variable and store all the programs in it from the database
        $programs = Program::get();

        //return a view and pass in the above variable
        return view('backend.programs.index')->withPrograms($programs);
    }

    public function create()
    {
      return view('backend.programs.create');
    }

    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
          'title'       => 'required|max:255|unique:programs,title',
          'description'        => 'required',
        ));

        //store the database
        $program = new Program;

        $createSlug = str_slug($request->title, '-');

        $program->user_id = Auth::user()->id;
        $program->title = $request->title;
        $program->slug = $createSlug;
        $program->description = Purifier::clean($request->description);

        //save our image
        if ($request->hasFile('file_name')) {
          $image = $request->file('file_name');
          $filename = time(). '.' . $image->getClientOriginalExtension();
          $location = public_path('images/programs/' . $filename);
          Image::make($image)->save($location);

          $program->file_name = $filename;
        }


        $program->save();

        Session::flash('success', 'The program was successfully saved!');
        //redirect to another page
        return redirect()->route('programs.show', $program->id);
        // dd($request->all());
    }

    public function publish(Request $request)
    {
      $program = Program::find($request->programId);
      $program->live = $request->programApproved;
      $program->save();
      return response()->json($program);
    }

 
    public function show($id)
    {
      $program = Program::find($id);
      return view('backend.programs.show')->withProgram($program);
    }

  
    public function edit($id)
    {

      // find the program in the database and save as a variable
      $program = Program::find($id); 
      if($program)
      {
         // return the view and pass in the var we previously created
         return view('backend.programs.edit')->withProgram($program);
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
          'description'        => 'required'
        ));

        // Save the data to the database
        $program = Program::find($id);

        $program->user_id = Auth::user()->id;
        $program->title = $request->input('title');
        $program->description  = Purifier::clean($request->input('description'));

        if ($request->hasFile('file_name')) {
           $programsImage = public_path("images/programs/{$program->file_name}"); // get previous program image from folder
            if (File::exists($programsImage) && $program->file_name != '') { 
                unlink($programsImage); // unlink or remove previous program image from folder
            }
          // take the new program image and update it in database and in folder
          $image = $request->file('file_name');
          $filename = time() . '-' . $image->getClientOriginalName();
          $location = public_path('images/programs/' . $filename);
          Image::make($image)->save($location);
          $program->file_name = $filename;
        }

        $program->save();

        //set flash data with success message
        Session::flash('success', 'This program was successfully updated. ');

        //redirect with flash data to programs.show
        return redirect()->route('programs.show', $program->id);
    }

   
    public function destroy($id)
    {
      $program = Program::find($id);

      $image_path = 'images/programs/'. $program->file_name;  //directory file path
                   
      if(File::exists($image_path) && $program->file_name != '') {

        File::delete($image_path);
        
      }

      $program->delete();

      return response()->json(['success'=> $program->title. ' was successfully deleted.']);
    }
}
