<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Input;
use App\User;
use Auth;
use App\Page;
use App\Activity;
use App\Role;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use File;
use Counter;

class SearchController extends Controller
{
  
    public function search(Request $request){
      $search = $request->qu;
      $posts = Post::where('title', 'LIKE', "%$search%")
                  ->orWhere('body', 'LIKE', "%$search%")
                  ->orWhere('slug', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%")
                  ->where('is_published','1')
                  ->paginate(6);
 
            $asideposts = Post::orderBy('created_at', 'desc')->where('is_published','1')->where('lang', config('app.locale'))->get();
            return view('frontend.pages.search')->withPosts($posts)->withAsideposts($asideposts);
    }

    public function activitySearch(Request $request){
      $s1 = $request->n;

      $activities = Activity::where('title', 'LIKE', '%'.$s1.'%')
                              ->where('live', '1')
                            ->orWhere('district', 'LIKE', '%'.$s1.'%')
                              ->where('live', '1')
                            ->orWhere('status', 'LIKE', '%'.$s1.'%')
                              ->where('live', '1')
                            ->orWhere('description', 'LIKE', '%'.$s1.'%')
                              ->where('live', '1')
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
                    <span class='program-title'><span>Program: </span>".$activity->program->title."</span>
                    <div class='step-content'>".$activity->description."
                    <a href='/activities/".$activity->slug."'>Read more</a></div>
                  </div>
                </div>
                ";         
            }
        }else{
            $s=$s."  
            <div class='col-md-12 col-sm-12 col-xs-12'>
              <div class='panel panel-default'>
                <div class='panel-body text-center'>       
                  <h3>Try again, We didn't find what you were looking for</p>
                </div>
              </div>
            </div>
                ";
        }
        
        return Response($s);
    }
}
