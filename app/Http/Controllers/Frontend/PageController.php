<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Advert;
use App\Role;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use App\Gallery;
use App\Activity;
use App\Partner;
use App\Video;
use App\About;
use App\Testimonial;
use App\Event;
use App\Program;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Counter;


class PageController extends Controller
{

    public function welcome()
    {
      $collection = Post::where('is_published','1')->get(); 
      if (!$collection->isEmpty()) {
        $postBody = $collection->random();
        if ($collection->count() >= 3) {
        $postsBody = $collection->random(3);
        }else{
          $postsBody = $collection->random();
        }
      }else{
        $postBody = $collection;
        $postsBody = $collection;
      }

      $posts = Post::where('is_published','1')->paginate(6);
      $events = Event::orderBy('created_at', 'desc')
                ->where('live','1')
                ->limit(3)
                ->get();
      $programs = Program::orderBy('created_at', 'asc')
                 ->where('live','1')
                 ->limit(6)
                 ->get();
      $activities = Activity::orderBy('created_at', 'desc')
                ->where('live','1')
                ->limit(4)
                ->get();

      $gallery = Gallery::orderBy('id', 'asc')->limit(4)->get();
      $id = 1;
      $abouts = About::where('id', $id)->first();
      $team = Team::orderBy('id', 'asc')->where('group', 'National Team')->limit(4)->get();
      $testimonials = Testimonial::orderBy('id', 'asc')->get();

      return view('frontend.welcome')->withPostBody($postBody)
                                  ->withPosts($posts)
                                  ->withActivities($activities)
                                  ->withGallery($gallery)
                                  ->withTeam($team)
                                  ->withAbouts($abouts)
                                  ->withTestimonials($testimonials)
                                  ->withEvents($events)
                                  ->withPrograms($programs);
    }

    public function profile($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      return view("frontend.pages.profile")->withUser($user);
    }

    public function contact()
    {
      return view('frontend.pages.contact');
    }

    public function gallery()
    {
      $galleries = Gallery::orderBy('id', 'desc')->paginate(20);
      return view('frontend.pages.gallery')->withGalleries($galleries);
    }

    public function partners()
    {
        $partners = Partner::orderBy('id', 'asc')->paginate(16);
        return view('frontend.pages.partners')->withPartners($partners);
    }

    public function video()
    {
        $videos = Video::all();
        return view('frontend.pages.video')->withVideos($videos);
    }

    public function search()
    {
        return view('frontend.pages.search');
    }

    public function donate()
    {
        return view('frontend.pages.donate');
    }

    public function all(){
      $pages = Page::orderBy('created_at', 'asc')->where('is_published','1')->get();
      return view('frontend.pages.all')->withPages($pages);
    }

    public function single($slug)
    {
      // Fetch from the DB based on slug
      $page = Page::where('slug', '=', $slug)->where('is_published','1')->first();

      return view('frontend.pages.single')->withPage($page);
    }
}
