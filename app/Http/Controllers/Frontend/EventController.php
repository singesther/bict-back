<?php

namespace App\Http\Controllers\Frontend;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Tag;
use App\Project;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Counter;

class EventController extends Controller
{
  
    public function all(){
      $events = Event::orderBy('created_at', 'desc')
                    ->where('is_published','1')
                    ->where('lang', config('app.locale'))
                    ->paginate(9);

      $projects = Project::orderBy('created_at', 'desc')
                    ->where('is_published','1')
                    ->where('lang', config('app.locale'))
                    ->paginate(9);

      $categories = Category::limit(5)->get();
      $eventsaside = Event::orderBy('created_at', 'asc')
                  ->where('is_published','1')
                  ->where('lang', config('app.locale'))
                  ->limit(5)
                  ->get();

      return view('frontend.news.all')
              ->withEvents($events)
              ->withProjects($projects)
              ->withCategories($categories)
              ->withAsideevents($eventsaside);

 
    }

    public function single($slug)
    {
      // Fetch from the DB based on slug
      $event = Event::where('slug', '=', $slug)->where('is_published','1')->first();
      $relatedEvents = Event::where('category_id', '=', $event->category_id)->orderBy('created_at', 'asc')->where('is_published','1')->limit(4)->get();
      
      $categories = Category::limit(10)->get();

      $user = User::where('id', $event->user['id'])->with('roles')->first();

      return view('frontend.news.single')->withEvent($event)->withRelatedEvents($relatedEvents)->withCategories($categories)->withUser($user);
    }

    public function search(Request $request){
      $search = $request->qu;
      $events = Event::where('title', 'LIKE', "%$search%")
                  ->orWhere('body', 'LIKE', "%$search%")
                  ->orWhere('slug', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%")
                  ->where('is_published','1')
                  ->paginate(6);
 
            $asideevents = Event::orderBy('created_at', 'desc')->where('is_published','1')->get();
            return view('pages.search')->withEvents($events)->withAsideevents($asideevents);
    }

    public function liveSearch(Request $request){
        $s1 = $request->n;

        $events = Event::where('title', 'LIKE', '%'.$s1.'%')
                      ->orWhere('body', 'LIKE', '%'.$s1.'%')
                      ->orWhere('created_at', 'LIKE', '%'.$s1.'%')
                      ->where('is_published','1')
                      ->get();
        $s="";

        if($events->count() > 0){
            foreach ($events as $key => $event){
                $s=$s."
                <a class='link-p-colr' href='/events/".$event->slug."'>
                    <div class='live-outer'>
                            <div class='live-im'>
                                <img src='/images/events/".$event->image."'/>
                            </div>
                            <div class='live-event-det'>
                                <div class='live-event-name'>
                                    <p>".$event->title."</p>
                                </div>
                            </div>
                        </div>
                </a>
                "   ;
            }
        }else{
             $s=$s."  
                <div class='live-outer'>
                    <div class='live-event-det'>
                        <div class='live-event-name'>
                            <p>Ongera ugerageze, ibyo ushyizemo ntabwo bibonetse</p>
                        </div>
                    </div>
                </div>
                ";

        }
        
        return Response($s);
    }

}
