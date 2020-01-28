@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('styles')
<meta property="og:title" content="{{ $post->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($post->body), 0, 60) }}"/>
<meta property="og:url" content="{{ url('posts/'.$post->slug) }}"/>
<meta property="og:image" content="{{ asset('images/posts/' . $post->thumbnail) }}"/>
<meta property="og:type" content="article" />

<link rel="stylesheet" type="text/css" href="/frontend/css/newstoday-r.css" />
<style type="text/css">

#eventimage{
    width:80%;
    height:500px;
}
#text{
    width: 80%;
    text-align: justify;
    /*padding: 10px;*/
}
#comment{
width: 80%;
margin: 0 auto;
}
#comment-input{
    background-color: white;
    color: black;
}
#comment-form{
    padding: 20px;
    background-color: #083545;
}

/*body{
    margin-top:20px;
    background:#FDFDFD;
}*/
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
    margin-bottom: 20px;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}

#reply{
    display: none;
}
#media{
    font-size: 14px;
}
.tems{
    display: inline-block;
    vertical-align: top;
}


.comment-form {
 padding:30px
}
.comment-form.no-pad {
 padding-right:0;
 padding-left:0
}
.comment-form--bordered {
 border-right:1px solid #eae9e9;
 border-bottom:1px solid #eae9e9;
 border-left:1px solid #eae9e9
}
.comment-form textarea {
 height:150px
}
.comment-form label {
 color:#717171
}
.comment-form .c-btn {
 font-size:14px
}
.comments-box {
 overflow:hidden;
 padding:30px 30px 0
}
.comments-box.no-pad {
 padding-right:0;
 padding-left:0
}
.comments-box--alt {
 border-right:1px solid #eae9e9;
 border-bottom:1px solid #eae9e9;
 border-left:1px solid #eae9e9
}
.comments-box .comment-list {
 overflow:hidden;
 margin-bottom:-30px
}
.comments-box .comment-list .comment {
 -webkit-transform:translateY(1px);
 -ms-transform:translateY(1px);
 transform:translateY(1px)
}
.comments-box .comment-list .comment .comment-body {
 position:relative;
 display:-webkit-box;
 display:-webkit-flex;
 display:-moz-box;
 display:-ms-flexbox;
 display:flex;
}

@media (max-width:575px) {
 .comments-box .comment-list .comment .comment-body {
  -webkit-flex-wrap:wrap;
  -ms-flex-wrap:wrap;
  flex-wrap:wrap
 }
}
.comments-box .comment-list .comment .comment-body .author-pic {
 flex:0 0 70px;
 margin-right:20px;
 -webkit-border-radius:50%;
 border-radius:50%;
 -webkit-box-flex:0;
 -moz-box-flex:0;
 -webkit-flex:0 0 70px;
 -ms-flex:0 0 70px
}
.comments-box .comment-list .comment .comment-body .comment-content {
 display:-webkit-box;
 display:-webkit-flex;
 display:-moz-box;
 display:-ms-flexbox;
 display:flex;
 -webkit-flex-wrap:wrap;
 -ms-flex-wrap:wrap;
 flex-wrap:wrap
}
@media (max-width:575px) {
 .comments-box .comment-list .comment .comment-body .comment-content {
  flex:0 0 100%;
  margin-top:15px;
  -webkit-box-flex:0;
  -moz-box-flex:0;
  -webkit-flex:0 0 100%;
  -ms-flex:0 0 100%
 }
}
.comments-box .comment-list .comment .comment-body .comment-content time {
 color:gray;
 font-size:1.6rem
}
.comments-box .comment-list .comment .comment-body .postReplay {
 position:absolute;
 top:0;
 right:0;
 color:#ed1b2f;
 font-size:15px;
 font-weight:600
}
.comments-box .comment-list .comment .comment-body p,.comments-box .comment-meta {
 flex:0 0 100%;
 -webkit-box-flex:0;
 -moz-box-flex:0;
 -webkit-flex:0 0 100%;
 -ms-flex:0 0 100%
}
.comments-box .comment-list .comment ol.children {
 padding-left:30px
}
.comments-box .comment-meta {
 margin-top:-5px;
 margin-bottom:30px;
 line-height:1
}
.comments-box .comment-meta .item {
 display:inline-block;
 margin-right:25px;
 color:gray
}
.comments-box .comment-meta .item a {
 color:gray
}
@media (max-width:767px) {
 .comments-box .comment-meta .item:first-child {
  display:none
 }
}
</style>

@endsection


@section('content')
    <!-- start of comments section -->

    <div class="container section-padding" style="margin-top: 100px;">
        <div style="width: 80%;margin: 0 auto;">
            <div>
                <h4>{{ $post->title }}</h4>
                <div class="post-meta">
                    <div class="tems">
                        <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('d/m/Y') }}</time>
                    </div>
                    <div class="tems">
                        <ul class="categories">
                            <i class="fa fa-folder-open"></i><a href="{{ route('categories.single', $post->category->slug) }}">{{ $post->category->name }}</a>
                        </ul>
                    </div>
                </div>
                <div>
                    <a href="">
                        <img src="{{ asset('images/news/'. $post->thumbnail)}}"
                                    alt="{{ $post->title }}" class="post-image img-responsive"/>
                    </a>
                    <p id="text">{!! $post->content !!}</p>
                </div>
               
                <div class="post-share-alt u-margin-t-40 tex-center" style="margin: 20px auto;">
                            Share on:
                             <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        </div>

                        <div class="post-tags-alt u-margin-t-40">
                            <h6>Tags :</h6>
                            <div class="tags-wrap">
                                @foreach ($post->tags as $tag)
                                  <a class="cat-world" href="#"><i class="fa fa-tag" aria-hidden="true"></i>{{ $tag->name }}</a>
                                @endforeach
                                
                               <!--  <a class="cat-local" href="#"><i class="fa fa-tag" aria-hidden="true"></i>Amerika</a> -->
                            </div>
                        </div>
            </div>
        </div>

        <div id="comment">
            <h5><i class="fa fa-comment"></i> Comments</h5>
            <hr>





<div class="comments-box no-pad">
    <ol class="comment-list">
        @foreach($post->comments as $comment)
        <li class="comment parent g-bg-secondary g-pa-30">
            <article class="comment-body">
                <div class="author-pic">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15 avatar" src="/images/avatar-70x70.png" alt="">
                </div>
                <div class="comment-content">
                    <div>
                        <h4 class="author-name font-weight-normal"><a href="#">{!! $comment->name !!}</a></h4>
                        <p>{!! $comment->comment !!}</p>
                    </div>
                    <div style="margin-left:10px;" class="comment-meta">
                        <div class="item">
                            <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</time>
                        </div>
                        <div class="item">
                            <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{!! $comment->name !!}" article_id="{{$post->id}}" token="{{ csrf_token() }}" class="reply"><i class="fa fa-reply"></i>Reply</a>
                        </div>

                        <div class="reply-form">
                    
                            <!-- Dynamic Reply form -->
                            
                        </div>
                    </div>
                </div>

            </article>
            <ol class="children">
             @foreach($comment->replies as $rep)
                @if($comment->id === $rep->comment_id)
                <li class="comment parent g-bg-secondary">
                    <article class="comment-body">
                        <div class="author-pic">
                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15 avatar" src="/images/avatar-70x70.png" alt="">
                        </div>
                        <div style="margin-left:10px;" class="comment-content">
                            <div>
                                <h4 class="author-name font-weight-normal"><a href="#">{{ $rep->name }}</a></h4>
                                <p>{{ $rep->reply }}</p>
                            </div>
                            <div class="comment-meta">
                                <div class="item">
                                    <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ date('F dS, Y - g:iA' ,strtotime($rep->created_at)) }}</time>
                                </div>
                                <div class="item">
                                    <a rname="{{ $comment->name }}" rid="{{ $comment->id }}" article_rid="{{$post->id}}"style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}"><i class="fa fa-reply"></i>Reply</a>
                                </div>

                                <div class="reply-to-reply-form">
                                    <!-- Dynamic Reply to reply form -->
                                </div>

                            </div>
                        </div>
                        
                    </article>
                </li>
                @endif 
                @endforeach
            </ol>
        </li>
        @endforeach
    </ol>
</div>




            <div class="posts-box3 u-margin-t-40">
                <div class="posts-box3__top no-pad">
                    <h4 class="posts-box3__top__title font-weight-normal"><span>Responses</span></h4>
                </div>
                <div class="comment-form no-pad">
                    <form class="row" method="POST" action="{{ route('comments.store', $post->id) }}" >
                    {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inp1">Full Name</label>
                                <input class="form-control" id="inp1" type="text" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inp2">Email Address</label>
                                <input class="form-control" id="inp2" type="email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 u-margin-t-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Your Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="comment" value="{{ old('email') }}" rows="5" required>
                                </textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-submit u-margin-t-15">
                                <button type="submit" class="btn text-uppercase c-btn c-btn--solid c-btn--color-brand">POST A COMMENT</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div> <!--//.posts-box  -->
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
        $(".comments-box").delegate(".reply","click",function(){

            var comment_content = $(this).parent().parent();
            var cid = $(this).attr("cid");
            var token = $(this).attr('token');
            var article_id = $(this).attr('article_id');
            // document.getElementById("hiddenVal").value = article_id;
            
            var form = '<form method="post" action="{{URL::to("replies")}}' + '/' +article_id+'"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+cid+'"><div class="col-md-6 input-left"><div class="form-group"><input type="text" name="name" class="form-control" placeholder="Full Name" ></div></div><div class="col-md-6 input-right"><div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div></div><div class="form-group"><textarea class="form-control" name="reply" placeholder="Your Comment" > </textarea> </div> <div class="form-group"> <input class="btn c-btn--color-brand" type="submit" value="Reply"> </div></form>';

            comment_content.find(".reply-form").append(form);
        });

        $(".comments-box").delegate(".reply-to-reply","click",function(){

            var comment_content = $(this).parent().parent();
            var cid = $(this).attr("rid");
            var token = $(this).attr("token")
            var article_id = $(this).attr('article_rid');

            // document.getElementById("hiddenVal").value = article_id;

            var form = '<form method="post" action="{{url("replies")}}' + '/' +article_id+'"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+cid+'"><div class="col-md-6 input-left"><div class="form-group"><input type="text" name="name" class="form-control" placeholder="Full Name" ></div></div><div class="col-md-6 input-right"><div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div></div><div class="form-group"><textarea class="form-control" name="reply" placeholder="Your Comment" > </textarea> </div> <div class="form-group"> <input class="btn c-btn--color-brand" type="submit" value="Reply"> </div></form>';

            comment_content.find(".reply-to-reply-form").append(form);

        });
    }); 
</script>
@endsection