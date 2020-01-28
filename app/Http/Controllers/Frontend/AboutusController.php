<?php

namespace App\Http\Controllers\Frontend;

use App\About;
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

class AboutusController extends Controller
{
    public function all()
    {
      $abouts = About::all();
      return view('frontend.aboutus.all')->withAbouts($abouts);
    }

    public function single($slug)
    {
     // Fetch from the DB based on slug
      $about = About::where('slug', '=', $slug)->where('is_published','1')->first();
      return view('frontend.aboutus.single')->withAbout($about);
    }   

    public function visionMission()
    {
      if(config('app.locale') == 'en'){
        $missionVigloj = About::where('slug', 'mission-of-vigloj')->first();
        $visionVigloj = About::where('slug', 'vision-of-vigloj')->first();
        $objectives = About::where('slug', 'objectives')->first();
      }else if(config('app.locale') == 'fr'){
        $missionVigloj = About::where('slug', 'la-mission-de-vigloj')->first();
        $visionVigloj = About::where('slug', 'la-vision-de-vigloj')->first();
        $objectives = About::where('slug', 'les-objectifs')->first();
      }
      
      return view('frontend.aboutus.vision_and_mission')
                ->withMissionVigloj($missionVigloj)
                ->withVisionVigloj($visionVigloj)
                ->withObjectives($objectives);
    }

    public function background()
    {
      if(config('app.locale') == 'en'){
        $background = About::where('slug', 'background')->first();
      }else if(config('app.locale') == 'fr'){
        $background = About::where('slug', 'contexte')->first();
      }
      return view('frontend.aboutus.background')->withBackground($background);
    }

    public function ourApproach()
    {
      if(config('app.locale') == 'en'){
        $ourApproach = About::where('slug', 'youth-empowrement-solutionsyes')->first();
      }else if(config('app.locale') == 'fr'){
        $ourApproach = About::where('slug', 'solutions-empowrement-jeunesse-yes')->first();
      }
      return view('frontend.aboutus.our_approach')->withOurApproach($ourApproach);
    }
}
