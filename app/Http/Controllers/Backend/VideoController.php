<?php

namespace App\Http\Controllers\Backend;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;

class VideoController extends Controller
{
   public function __construct(){
        $this->middleware('role:admin|superadmin');
    }

    public function index()
    {
        $videos = Video::all();
        $livevideos = Video::orderBy('created_at', 'desc')->where('is_published','1')->limit(5)->get();
        return view('backend.videos.index')->withVideos($videos)->withLivevideos($livevideos);
    }

    public function create()
    {
        return view('backend.videos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'video_code' => 'required|unique:videos,video_code',
            'title' => 'nullable|string|max:90',
            'description' => 'nullable|string|max:500'
        ));

        //store the database
        $video = new Video;

        $video->user_id = Auth::user()->id;

        //save our video
        $video->video_code = $request->video_code;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->is_published = $request->has('live');

        $video->save();

        Session::flash('success', 'The video was successfully saved!');
        //redirect to another page
        return redirect()->route('videos.show', $video->id);
    }


    public function show($id)
    {
         $video = Video::find($id);
         return view('backend.videos.show')->withVideo($video);
    }


    public function publish(Request $request)
    {
        $video = Video::find($request->videoId);
        $video->is_published = $request->videoApproved;
        $video->save();
        return response()->json($video);
    }


    public function edit($id)
    {
        $video = Video::find($id);
        // return the view and pass in the var we previously created
        return view('backend.videos.edit')->withVideo($video);
    }

    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
        'video_code'        => "required|unique:videos,video_code, $id",
        'title' => 'nullable|string|max:90',
        'description' => 'nullable|string|max:500'
        ));

        $video = Video::find($id);

        $video->user_id = Auth::user()->id;

        $video->video_code = $request->video_code;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->is_published = $request->has('live');

        $video->save();

        Session::flash('success', 'The video was successfully updated!');
        //redirect to another page
        return redirect()->route('videos.show', $video->id);
    }


    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        Session::flash('success', 'The video was successfully deleted.');
        return redirect()->route('videos.index');
    }
}
