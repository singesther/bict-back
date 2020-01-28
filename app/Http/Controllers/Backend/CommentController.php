<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use Purifier;

class CommentController extends Controller
{
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('backend.comments.edit')->withComment($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request, array('comment' => 'required'));

        $comment->comment = Purifier::clean($request->comment);
        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('news.show', $comment->post->id);
    }

    public function delete($id)
    {
      $comment = Comment::find($id);
      return view('backend.comments.delete')->withComment($comment);
    }

    public function destroy($id)
    {
      $comment = Comment::find($id);
      $post_id = $comment->post->id;
      $comment->delete();

      Session::flash('success', 'Deleted Comment');

      return redirect()->route('news.show', $post_id);
    }
}
