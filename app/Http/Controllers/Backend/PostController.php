<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Tag;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Counter;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //create a variable and store all the blog posts in it from the database
        $posts = Post::get();

        //Count total posts
        $totalposts = Post::count();

        //Count approved posts
        $approvedposts = Post::where('is_published','1')->count();

        //Count not approved posts
        $notapprovedposts = Post::where('is_published','0')->count();

        //return a view and pass in the above variable
        return view('backend.news.index')->withPosts($posts)->withTotalposts($totalposts)->withApprovedposts($approvedposts)->withNotapprovedposts($notapprovedposts);
    }

    public function create()
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('backend.news.create')->withCategories($categories)->withTags($tags);
    }

    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
          'title'       => 'required|max:255',
          'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'content'        => 'required',
          'thumbnail' => 'required|image'
        ));

        //store the database
        $post = new Post;

        // $createSlug = str_slug($request->title, '-');

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = Purifier::clean($request->content);

        //save our image
        if ($request->hasFile('thumbnail')) {
          $image = $request->file('thumbnail');
          $filename = time(). '.' . $image->getClientOriginalExtension();
          $location = public_path('images/news/' . $filename);
          Image::make($image)->save($location);

          $post->thumbnail = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully saved!');
        //redirect to another page
        return redirect()->route('news.show', $post->id);
        // dd($request->all());
    }

    public function publish(Request $request)
    {
        $post = Post::find($request->postId);
        $post->is_published = $request->postApproved;
        $post->save();
        return response()->json($post);
    }

 
    public function show($id)
    {
        $post = Post::find($id);
        return view('backend.news.show')->withPost($post);
    }

  
    public function edit($id)
    {

      // find the post in the database and save as a variable
       $post = Post::find($id); 
       if($post)
       {

         $categories = Category::all();
         $cats = array();
         foreach ($categories as $category) {
           $cats[$category->id] = $category->name;
         }

         $tags = Tag::all();
         $tags2 = array();
         foreach ($tags as $tag){
           $tags2[$tag->id] = $tag->name;
         }
         // return the view and pass in the var we previously created
         return view('backend.news.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
       }
       else{
         return view('errors.403');
       }

    }

 
    public function update(Request $request, $id)
    {
        
        // Validate the data
        $this->validate($request, array(
          'title'       => 'required|max:90',
          'slug'        => "required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
          'content'        => 'required'
        ));


        // Save the data to the database
        $post = Post::find($id);

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->content  = Purifier::clean($request->input('content'));
        $post->is_published = $request->has('approval');

        if ($request->hasFile('thumbnail')) {
           $postsImage = public_path("images/news/{$post->thumbnail}"); // get previous post image from folder
            if (File::exists($postsImage) && $post->thumbnail != '') { 
                unlink($postsImage); // unlink or remove previous post image from folder
            }
          // take the new post image and update it in database and in folder
          $image = $request->file('thumbnail');
          $filename = time() . '-' . $image->getClientOriginalName();
          $location = public_path('images/news/' . $filename);
          Image::make($image)->save($location);
          $post->thumbnail = $filename;
        }


        $post->save();

         if (isset($request->tags)) {         // if tags are requested, go on and post the requested tags in the database
          $post->tags()->sync($request->tags);
        } else {
          $post->tags()->sync(array());    // if not, just post an empty array
        }



        //set flash data with success message
        Session::flash('success', 'This post was successfully updated. ');

        //redirect with flash data to news.show
        return redirect()->route('news.show', $post->id);
    }

   
    public function destroy($id)
    {
      $post = Post::find($id);

      $image_path = 'images/news/'. $post->thumbnail;  //directory file path
                   
      if(File::exists($image_path) && $post->thumbnail != '') {

          File::delete($image_path);
      }

      $post->delete();

      return response()->json(['success'=> $post->title. ' was successfully deleted.']);
    }
}
