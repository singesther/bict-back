<?php

namespace App\Http\Controllers\Frontend;

use App\Club;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{
    public function all()
    {
      $clubs = Club::all();
      return view('frontend.clubs.all')->withClubs($clubs);
    }

    public function single($slug)
    {
     // Fetch from the DB based on slug
      $club = Club::where('slug', '=', $slug)->where('is_published','1')->first();
      return view('frontend.clubs.single')->withClub($club);
    } 
}
