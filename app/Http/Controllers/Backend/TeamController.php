<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Role;
use Auth;
use Session;
use Purifier;
use Image;
use Storage;
use File;
use Input;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::get();
        return view('backend.team.index')->withTeam($team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.team.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => "nullable|string|email|max:50",
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string',
            'group' => 'required|string',
            'bio' => 'nullable|string|max:10000'
        ));

        //store the database
        $team = new Team;

        //save our image
        if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('images/team/' . $filename);
        Image::make($image)->save($location);

        $team->image = $filename;
        }
  
        $team->name = $request->name;
        $team->email = $request->email;
        // $team->position_category = $request->position;
        $team->position = $request->position;
        $team->bio = $request->bio;
        $team->group = $request->group;


        $team->save();

        // $team->roles()->sync($request->roles, false);

        Session::flash('success', 'New member was successfully saved!');
        //redirect to another page
        return redirect()->route('team.show', $team->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('backend.team.show')->withTeam($team);
    }

    public function publish(Request $request)
    {
        $team = Team::find($request->teamId);
        $team->is_published = $request->teamApproved;
        $team->save();
        return response()->json($team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        // return the view and pass in the var we previously created
        $roles = Role::all();
        $roles2 = array();
        foreach ($roles as $role){
           $roles2[$role->id] = $role->display_name;
        }
        return view('backend.team.edit')->withTeam($team)->withRoles($roles2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data

        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => "nullable|string|email|max:50",
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string',
            'group' => 'required|string',
            'bio' => 'nullable|string|max:10000'
        ));

        $team = Team::find($id);


        if ($request->hasFile('profile_image')) {
            $teamImage = public_path("images/team/{$team->image}"); // get previous image from folder
            if (File::exists($teamImage)) { // unlink or remove previous image from folder
                unlink($teamImage);
            }
            // take the new image and update it in database and in folder
            $image = $request->file('profile_image');
            $name = time() . '-' . $image->getClientOriginalName();
            $location = public_path('images/team/' . $name);
            Image::make($image)->save($location);
            $team->image = $name;
        }

        $team->name = $request->name;
        $team->email = $request->email;
        $team->position = $request->position;
        $team->bio = $request->bio;
        $team->group = $request->group;

        $team->save();

        if (isset($request->roles)) { // if roles are requested, go on and assign roles to team member in the database
          $team->roles()->sync($request->roles);
        } else {
          $team->roles()->sync(array());    // if not, just team an empty array
        }


        Session::flash('success', 'The member was successfully updated!');
        //redirect to another page
        return redirect()->route('team.show', $team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $team = Team::find($id);
        // Storage::delete($team->image);

        // $team->delete();
        
        // return response()->json($team);

        $team = Team::find($id);

        $file_path = 'images/team/'.$team->image;  //directory file path
                     
        if(File::exists($file_path) && $team->image != '') {

            File::delete($file_path);
        }


        $team->delete();

        return response()->json(['success'=> $team->name. ' was successfully deleted.']);
    }
}
