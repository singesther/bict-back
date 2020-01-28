<?php

namespace App\Http\Controllers\Frontend;

use App\Program;
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
use App\Activity;

class ProgramController extends Controller
{
    public function all($program){
      $activities = Program::where('live','1')->where('program_id', $program)->paginate(10);
      $programs = Program::orderBy('created_at', 'asc')
                 ->where('live','1')
                 ->limit(6)
                 ->get();
      return view('frontend.activities.all')->withActivities($activities)->withPrograms($programs);
    }

    public function single($program)
    {
      $program = Program::where('slug', '=', $program)->first();
      return view('frontend.programs.single')->withProgram($program);
    }

    public function search(Request $request){
      $search = $request->qu;
      $activities = Program::where('title', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%")
                  ->orWhere('slug', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%")
                  ->where('live','1')
                  ->paginate(6);
 
            $asideactivities = Program::orderBy('created_at', 'desc')->where('live','1')->get();
            return view('pages.search')->withActivities($activities)->withAsideactivities($asideactivities);
    }

    public function liveSearch(Request $request){
        $s1 = $request->n;

        $activities = Program::where('title', 'LIKE', '%'.$s1.'%')
                      ->orWhere('description', 'LIKE', '%'.$s1.'%')
                      ->orWhere('created_at', 'LIKE', '%'.$s1.'%')
                      ->where('live','1')
                      ->get();
        $s="";

        if($activities->count() > 0){
            foreach ($activities as $key => $activity){
                $s=$s."
                <div class='installation-step'>
                  <div class='img-act'>
                  <img src='/images/activities/".$activity->file_name."'>
                  </div>
                  <div class='cont-act'>
                    <p class='step-title'>".$activity->title."</p>
                    <span class='program-title'><span>In</span>".$activity->program->title."</span>
                    <div class='step-content'>".$activity->description."<a href=''> Read more</a></div>
                  </div>
                </div>
                ";         
            }
        }else{
             $s=$s."  
                <div class='live-outer'>
                    <div class='live-activity-det'>
                        <div class='live-activity-name'>
                            <p>Try again, We didn't find what you were looking for</p>
                        </div>
                    </div>
                </div>
                ";

        }
        
        return Response($s);
    }

    
}
