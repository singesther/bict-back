<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
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

class PostController extends Controller
{
  
    public function all(){
      $posts = Post::orderBy('created_at', 'desc')
                    ->where('is_published','1')
                    ->where('lang', config('app.locale'))
                    ->paginate(9);

      $projects = Project::orderBy('created_at', 'desc')
                    ->where('is_published','1')
                    ->where('lang', config('app.locale'))
                    ->paginate(9);

      $categories = Category::limit(5)->get();
      $postsaside = Post::orderBy('created_at', 'asc')
                  ->where('is_published','1')
                  ->where('lang', config('app.locale'))
                  ->limit(5)
                  ->get();

      return view('frontend.news.all')
              ->withPosts($posts)
              ->withProjects($projects)
              ->withCategories($categories)
              ->withAsideposts($postsaside);

 
    }

    public function single($slug)
    {
      // Fetch from the DB based on slug
      $post = Post::where('slug', '=', $slug)->where('is_published','1')->first();
      $relatedPosts = Post::where('category_id', '=', $post->category_id)->orderBy('created_at', 'asc')->where('is_published','1')->limit(4)->get();
      
      $categories = Category::limit(10)->get();

      $user = User::where('id', $post->user['id'])->with('roles')->first();

      return view('frontend.news.single')->withPost($post)->withRelatedPosts($relatedPosts)->withCategories($categories)->withUser($user);
    }

    public function search(Request $request){
      $search = $request->qu;
      $posts = Post::where('title', 'LIKE', "%$search%")
                  ->orWhere('body', 'LIKE', "%$search%")
                  ->orWhere('slug', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%")
                  ->where('is_published','1')
                  ->paginate(6);
 
            $asideposts = Post::orderBy('created_at', 'desc')->where('is_published','1')->get();
            return view('pages.search')->withPosts($posts)->withAsideposts($asideposts);
    }

    public function liveSearch(Request $request){
        $s1 = $request->n;

        $posts = Post::where('title', 'LIKE', '%'.$s1.'%')
                      ->orWhere('body', 'LIKE', '%'.$s1.'%')
                      ->orWhere('created_at', 'LIKE', '%'.$s1.'%')
                      ->where('is_published','1')
                      ->get();
        $s="";

        if($posts->count() > 0){
            foreach ($posts as $key => $post){
                $s=$s."
                <a class='link-p-colr' href='/posts/".$post->slug."'>
                    <div class='live-outer'>
                            <div class='live-im'>
                                <img src='/images/posts/".$post->image."'/>
                            </div>
                            <div class='live-post-det'>
                                <div class='live-post-name'>
                                    <p>".$post->title."</p>
                                </div>
                            </div>
                        </div>
                </a>
                "   ;
            }
        }else{
             $s=$s."  
                <div class='live-outer'>
                    <div class='live-post-det'>
                        <div class='live-post-name'>
                            <p>Ongera ugerageze, ibyo ushyizemo ntabwo bibonetse</p>
                        </div>
                    </div>
                </div>
                ";

        }
        
        return Response($s);
    }

}
