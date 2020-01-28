<?php

namespace App\Http\Controllers\Backend;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //create a variable and store all the blog events in it from the database
        $events = Event::get();

        //Count total events
        $totalevents = Event::count();

        //Count approved events
        $approvedevents = Event::where('live','1')->count();

        //Count not approved events
        $notapprovedevents = Event::where('live','0')->count();

        //return a view and pass in the above variable
        return view('backend.events.index')->withEvents($events)->withTotalevents($totalevents)->withApprovedevents($approvedevents)->withNotapprovedevents($notapprovedevents);
    }

    public function create()
    {
        return view('backend.events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'file_name' => 'required|mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:50000',
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string',
        'date' => 'required'
        ));

       
        $event = new Event;

        $event->user_id = Auth::user()->id;

        $createSlug = str_slug($request->title, '-').'-'.mt_rand(10000, 99999);

        //save our image
        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $location = public_path().'/images/events/';
            $file->move($location, $filename);
            $event->file_name = $filename;
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->slug =  $createSlug;
        $event->status = $request->status;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->hosted_by = $request->hosted_by;
        // $event->live = $request->has('live');

        $event->save();

        Session::flash('success', 'The event was successfully saved!');
        //redirect to another page
        return redirect()->route('events.show', $event->id);
    }


    public function show($id)
    {
         $event = Event::find($id);
         return view('backend.events.show')->withEvent($event);
    }

    public function publish(Request $request)
    {
        $event = Event::find($request->eventId);
        $event->live = $request->eventApproved;
        $event->save();
        return response()->json($event);
    }


    public function edit($id)
    {
        $event = Event::find($id);
        // return the view and pass in the var we previously created
        return view('backend.events.edit')->withEvent($event);
    }

    public function update(Request $request, $id)
    {

        // Validate the data
        $this->validate($request, array(
          'title'       => 'nullable|max:90',
          'slug'        => "required|alpha_dash|min:5|max:255|unique:events,slug, $id",
          'description' => 'nullable|string',
          'date' => "required",
          'file_name'        => 'image'
        ));


        // Save the data to the database
        $event = Event::find($id);

        $event->user_id = Auth::user()->id;
        $event->title = $request->input('title');
        $event->slug  = $request->input('slug');
        $event->description  = Purifier::clean($request->input('description'));
        $event->status = $request->status;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->hosted_by = $request->hosted_by;

        if ($request->hasFile('file_name')) {
           $eventsImage = public_path("images/events/{$event->file_name}"); // get previous event image from folder

           $default_image= null;
           $oldFilename = $event->file_name;
           if($oldFilename == $default_image)
           {
                // take the new event image and update it in database and in folder
               $file = $request->file('file_name');
               $filename = time() . '-' . $file->getClientOriginalName();
               $location = public_path().'/images/events/';
               $file->move($location, $filename);
               $event->file_name = $filename;
           }
           else{
                if (File::exists($eventsImage)) { // unlink or remove previous event image from folder
                    unlink($eventsImage);
                }
               // take the new event image and update it in database and in folder
               $file = $request->file('file_name');
               $filename = time() . '-' . $file->getClientOriginalName();
               $location = public_path().'/images/events/';
               $file->move($location, $filename);
               $event->file_name = $filename;
           }
        }

        $event->save();

        Session::flash('success', 'The event was successfully updated!');
        //redirect to another page
        return redirect()->route('events.show', $event->id);
    }


    public function destroy($id)
    {
        $event = Event::find($id);

        $file_path = 'images/events/'. $event->file_name;  //directory file path
                     
        if(File::exists($file_path) && $event->file_name != '') {

            File::delete($file_path);
        }


        $event->delete();

        return response()->json(['success'=> $event->title. ' was successfully deleted.']);
    }
}
