<?php

namespace App\Http\Controllers\Frontend;

use App\Story;
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


class StoryController extends Controller
{
    public function all(){
      $stories = Story::where('is_published','1')->where('lang', config('app.locale'))->paginate(9);
      $storiesaside = Story::orderBy('created_at', 'asc')->where('is_published','1')->limit(5)->get();
      return view('frontend.stories.all')->withStories($stories)->withAsidestories($storiesaside);
    }

    public function single($slug)
    {
      // Fetch from the DB based on slug
      $story = Story::where('slug', '=', $slug)->where('is_published','1')->first();

      $relatedStories = Story::orderBy('created_at', 'asc')->where('is_published','1')->limit(4)->get();

      return view('frontend.stories.single')->withStory($story)->withRelatedStories($relatedStories);
    }
}
