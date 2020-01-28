<?php

namespace App\Http\Controllers\Frontend;

use App\CommentReply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Session;
use Purifier;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {

        $post = Post::find($post_id);

        $this->validate($request, array(
          'name'  => 'required|max:255',
          'email' => 'required|email|max:255',
          'reply' => 'required|min:3|max:2000'
        ));

        CommentReply::create([
            'comment_id' => $request->input('comment_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'reply' => $request->input('reply')
        ]);

        Session::flash('success', 'Reply added');

        return redirect()->route('news.single', [$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentReply  $commentReply
     * @return \Illuminate\Http\Response
     */
    public function show(CommentReply $commentReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentReply  $commentReply
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentReply $commentReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentReply  $commentReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentReply $commentReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentReply  $commentReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentReply $commentReply)
    {
        //
    }
}
