<?php

namespace App\Http\Controllers\Frontend;

use App\Team;
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

class TeamController extends Controller
{
    public function all()
    {
      $team = Team::all();
      return view('frontend.our-team.all')->withTeam($team);
    }

    public function single($slug)
    {
     
     // Fetch from the DB based on slug
      $team = Team::where('slug', '=', $slug)->where('is_published','1')->first();
      return view('frontend.our-team.single')->withTeam($team);
    }   
}