<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Auth;
use Image;
use Storage;
use File;
use Input;
use Hash;


class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
      return redirect()->route('profile.show');
    }

    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      if($user)  //if the logged user is the current user
      {
        return view("backend.profile.show")->withUser($user);
      }
      else{
          return view('backend.errors.403');
      }
    }

    public function edit($id)
    {
      // find the User in the database and save as a variable
      $user =  User::where('id', $id)->where('id', '=', Auth::user()->id)->first();
      if($user)  //if the logged user is the current user
      {
          return view('backend.profile.edit')->withUser($user);
      }
      else{
          return view('backend.errors.403');
      }
    }

    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();

        $this->validate($request, array(
          'name' => 'required|string|max:50',
          'tel' => "nullable|min:10|unique:users,tel, $user->id",
          'email' => "required|string|email|max:255|unique:users,email, $user->id",
          'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
          'bio' => 'nullable|min:5|max:3000'
        ));

        // updates in users table
        $user->name = $request->input('name');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->district = $request->input('district');
        $user->profile->gender = $request->input('gender');
        $user->profile->dob = $request->input('dob');
        $user->profile->province = $request->input('province');

       if ($request->hasFile('profile_image')) {
           $default_image='default-avatar.png';
           $oldFilename = $user->profile_image;
           if($oldFilename == $default_image)
           {
             $file = Input::file('profile_image');
             $name = time() . '-' . $file->getClientOriginalName();
             $file = $file->move(('images/users'), $name);
             $user->profile_image= $name;
           }else
           {
             $usersImage = public_path("images/users/{$user->profile_image}"); // get previous image from folder
             if (File::exists($usersImage)) { // unlink or remove previous image from folder
                 unlink($usersImage);
             }
             $file = Input::file('profile_image');
             $name = time() . '-' . $file->getClientOriginalName();
             $location = public_path('images/users/' . $name);
             Image::make($file)->resize(150, 150)->save($location);
             $user->profile_image= $name;
           }
       }

       $user->push();

       Session::flash('success', 'Profile was updated');

       return redirect()->back();

       // dd($request->all());
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->to('/dashboard/profile/'. Auth::user()->id.'/edit#account')->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->to('/dashboard/profile/'. Auth::user()->id.'/edit#account')->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->to('/dashboard/profile/'. Auth::user()->id.'/edit#account')->with("success","Password changed successfully !");

    }
}
