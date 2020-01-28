<?php

namespace App\Http\Controllers\Backend;

use App\Activity;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;
use App\User;


class ActivityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //create a variable and store all the activities in it from the database
        $activities = Activity::get();

        //Count total activities
        $totalactivities = Activity::count();

        //Count approved activities
        $approvedactivities = Activity::where('live','1')->count();

        //Count not approved activities
        $notapprovedactivities = Activity::where('live','0')->count();

        //return a view and pass in the above variable
        return view('backend.activities.index')->withActivities($activities)->withTotalactivities($totalactivities)->withApprovedactivities($approvedactivities)->withNotapprovedactivities($notapprovedactivities);
    }

    public function create()
    {
      $programs = Program::all();
      return view('backend.activities.create')->withPrograms($programs);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
          'file' => 'required|mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:50000',
          'title' => 'nullable|string|max:90',
          'description' => 'nullable|string'
        ));

       
        $activity = new Activity;

        $activity->user_id = Auth::user()->id;
        $activity->program_id = $request->program_id;
        $createSlug = str_slug($request->title, '-').'-'.mt_rand(10000, 99999);

        //save our image
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $location = public_path().'/images/activities/';
            $file->move($location, $filename);
            $activity->file_name = $filename;
        }

        $user = User::where('id', Auth::user()->id)->first(); 

        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->slug =  $createSlug;
        $activity->status = $request->status;
        $activity->date = $request->date;
        $activity->district = $user->district;
        // $activity->live = $request->has('live');

        $activity->save();

        Session::flash('success', 'The activity was successfully saved!');
        //redirect to another page
        return redirect()->route('activities.show', $activity->id);
    }


    public function show($id)
    {
        $activity = Activity::find($id);
        if($activity)
        {
         return view('backend.activities.show')->withActivity($activity);
        }else{
          return view('errors.403');
        }
    }

    public function publish(Request $request)
    {
        $activity = Activity::find($request->activityId);
        $activity->live = $request->activityApproved;
        $activity->save();
        return response()->json($activity);
    }


    public function edit($id)
    {
        $activity = Activity::where('user_id', '=', Auth::user()->id)->find($id);
        if($activity)
        {
          $programs = Program::all();
          $cats = array();
          foreach ($programs as $program) {
            $cats[$program->id] = $program->title;
          }

          // return the view and pass in the var we previously created
          return view('backend.activities.edit')->withActivity($activity)
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
        $activity = Activity::where('user_id', '=', Auth::user()->id)->find($id);

        $activity->program_id = $request->program_id;
        $activity->title = $request->input('title');
        $activity->description  = Purifier::clean($request->input('description'));
        $activity->status = $request->status;
        $activity->date = $request->date;
        $activity->district = $request->district;
        $activity->live = 0;

        if ($request->hasFile('file')) {
          $activitiesImage = public_path("images/activities/{$activity->file_name}"); // get  previous activity image from folder

          $default_image= null;
          $oldFilename = $activity->file_name;
          if($oldFilename == $default_image)
          {
              // take the new activity image and update it in database and in folder
             $file = $request->file('file');
             $filename = time() . '-' . $file->getClientOriginalName();
             $location = public_path().'/images/activities/';
             $file->move($location, $filename);
             $activity->file_name = $filename;
          }

          else{
              if (File::exists($activitiesImage)) { // unlink or remove previous activity image from folder
                  unlink($activitiesImage);
              }
             // take the new activity image and update it in database and in folder
             $file = $request->file('file');
             $filename = time() . '-' . $file->getClientOriginalName();
             $location = public_path().'/images/activities/';
             $file->move($location, $filename);
             $activity->file_name = $filename;
          }
        }

        $activity->save();

        Session::flash('success', 'The activity was successfully updated!');
        //redirect to another page
        return redirect()->route('activities.show', $activity->id);
    }

    public function districtActivities()
    {

        //create a variable and store all the activities in it from the database
        $activities = Activity::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();

        //Count total activities
        $totalactivities = Activity::where('user_id', '=', Auth::user()->id)->count();

        //Count approved activities
        $approvedactivities = Activity::where('user_id', '=', Auth::user()->id)->where('live','1')->count();

        //Count not approved activities
        $notapprovedactivities = Activity::where('user_id', '=', Auth::user()->id)->where('live','0')->count();

        //return a view and pass in the above variable
        return view('backend.activities.district')->withActivities($activities)->withTotalactivities($totalactivities)->withApprovedactivities($approvedactivities)->withNotapprovedactivities($notapprovedactivities);
    }

    public function activitiesReport()
    {

        //create a variable and store all the activities in it from the database
        $activities = Activity::get();

        //Count total activities
        $totalActivities = Activity::count();

        //return a view and pass in the above variable
        return view('backend.activities.report')->withActivities($activities)->withTotalActivities($totalActivities);
    }

    public function activityRange(Request $request)
    {

      $rangeResults = Activity::whereBetween('created_at', [$request->From, $request->to])
                              ->get();

      $result = '';
      $result .='
          <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>District</th>
            <th>Program</th>
            <th>Description</th>
            <th>Created date</th>
          </tr>';

      if($rangeResults->count() > 0)
      {
        $no=1; 
        foreach ($rangeResults as $key => $activity){
          $result .='
          <tr>
            <td>'.$no++.'</td>
            <td>'.substr(strip_tags($activity->title), 0, 50).'</td>
            <td>'.$activity->user->district.'</td>
            <td>'.$activity->program->title.'</td>
            <td>'.substr(strip_tags($activity->description), 0, 50).'</td>
            <td>'.date('M j, Y', strtotime($activity->created_at)).'</td>
          </tr>';
        }
      }
      else
      {
        $result .='
        <tr>
          <td colspan="6">No Activity Found</td>
        </tr>';
      }
      $result .='</table>';
      return Response($result);
    }



    public function destroy($id)
    {
        $activity = Activity::where('user_id', '=', Auth::user()->id)->find($id);

        if($activity)
        {
          $file_path = 'images/activities/'. $activity->file_name;  //directory file path
          if(File::exists($file_path) && $activity->file_name != '') {

              File::delete($file_path);
          }
          $activity->delete();

          return response()->json(['success'=> $activity->title. ' was successfully deleted.']);

        }else{
          return view('errors.403');
        }
    }
}
