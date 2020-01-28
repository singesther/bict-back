<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Input;
use App\Profile;
use Image;
use Storage;
use File;
use Auth;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function districtMembers()
    {
      $users = User::orderBy('id', 'asc')->where('district', Auth::user()->district)->paginate(10);
      return view('backend.members.district')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function memberShow($id)
    {
      $user = User::where('id', $id)->where('district', Auth::user()->district)->with('roles')->first();
      if($user){
        return view("backend.members.show")->withUser($user);
      }else{
        return view('errors.403');
      }
    }

    public function memberEdit($id)
    {
      $user = User::where('id', $id)->where('district', Auth::user()->district)->with('roles')->first();
      if($user){
        return view("backend.members.edit")->withUser($user);
      }else{
        return view('errors.403');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function memberUpdate(Request $request, $id)
    {
      $user = User::findOrFail($id);

      $this->validate($request, [
        'name' => 'required|max:255',
        'tel' => 'required|max:32|unique:users,tel,'.$id,
        'email' => 'required|email|unique:users,email,'.$id
      ]);

      $user->name = $request->name;
      $user->tel = $request->tel;
      $user->email = $request->email;
      $user->profile->status = $request->status;

      if ($request->password_options == 'auto') {
        $user->password = Hash::make($request->auto_password);
      } elseif ($request->password_options == 'manual') {
        $user->password = Hash::make($request->manual_password);
      }
      // $user->save(); -> this can not be used to update in multiple related tables, instead use
      $user->push(); //To update in multiple related tables

      Session::flash('success', 'The user was successfully updated!');
        //redirect to another page
      return redirect()->route('member.show', $user->id);

      // dd($request->All());
    }
}
