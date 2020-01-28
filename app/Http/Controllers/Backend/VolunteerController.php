<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;


class VolunteerController extends Controller
{
    public function index()
    {
      $users = User::orderBy('id', 'desc')->paginate(10);
      return view('backend.volunteers.index')->withUsers($users);
    }

    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      return view("backend.volunteers.show")->withUser($user);
    }
}
