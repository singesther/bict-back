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


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'asc')->paginate(10);
      return view('backend.manage.users.index')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      if($user){
        return view("backend.manage.users.show")->withUser($user);
      }else{
        return view('errors.403');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::all();
      $user = User::where('id', $id)->with('roles')->first();
      if($user){
        return view("backend.manage.users.edit")->withUser($user)->withRoles($roles);
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
    public function update(Request $request, $id)
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

      if($request->roles == null){
        return redirect()->route('users.show', $id);
      }
      else{
        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('users.show', $id);
      }

      Session::flash('success', 'The user was successfully updated!');
        //redirect to another page
      return redirect()->route('users.show', $user->id);

      // dd($request->All());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
