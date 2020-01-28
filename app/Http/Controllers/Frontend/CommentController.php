<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use Purifier;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {

        $this->validate($request, array(
          'name'  => 'required|max:255',
          'email' => 'required|email|max:255',
          'comment' => 'required|min:3|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = Purifier::clean($request->comment);
        $comment->is_published = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added');

        return redirect()->route('news.single', [$post->slug]);
    }
}
