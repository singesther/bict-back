<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Session;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::all();
      return view('backend.manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('backend.manage.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'display_name' => 'required|max:255',
        'name' => 'required|max:100|alpha_dash|unique:roles,name',
        'description' => 'sometimes|max:255'
      ]);

      $role = new Role();
      $role->display_name = $request->display_name;
      $role->name = $request->name;
      $role->description = $request->description;
      $role->save();


      Session::flash('success', 'Successfully created the new '. $role->display_name . ' role in the database.');
      return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $role = Role::where('id', $id)->first();
      return view('backend.manage.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::where('id', $id)->first();
      return view('backend.manage.roles.edit')->withRole($role);
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
      $this->validate($request, [
        'display_name' => 'required|max:255',
        'description' => 'sometimes|max:255'
      ]);

      $role = Role::findOrFail($id);
      $role->display_name = $request->display_name;
      $role->description = $request->description;
      $role->save();


      Session::flash('success', 'Successfully update the '. $role->display_name . ' role in the database.');
      return redirect()->route('roles.show', $id);
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
