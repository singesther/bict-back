@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($story->title); ?>
@section('title', "| $titleTag")

@section('styles')
<meta property="og:title" content="{{ $story->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($story->description), 0, 60) }}"/>
<meta property="og:url" content="{{ url('stories/'.$story->slug) }}"/>
<meta property="og:image" content="{{ asset('images/stories/' . $story->file) }}"/>
<meta property="og:type" content="article" />

<link rel="stylesheet" type="text/css" href="/frontend/css/newstoday-r.css" />
<style type="text/css">
    .input-left{
        padding-left: 0px;
        padding-top: 20px;
    }
    .input-right{
        padding-right: 0px;
        padding-top: 20px;
    }
    .site-header {
        border-bottom: 1px solid #2828281a;
    }
</style>
@endsection


@section('content')
<section class="has-sidebar" style="margin: 30px 0px;">
    <div class="container">
        <div class="row" data-sticky_parent="" style="position: relative;">
        <div class="col-lg-8 col-md-8 content-wrapper">
            <div data-sticky_column="">
                <div class="m-post-content m-post-content--tok">
                    <div class="post-top">
                        <h1 class="post-title">{{ $story->title }} </h1>
                        <div class="post-meta">
                            <div class="item">
                                <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ $story->created_at->format('d/m/Y') }}</time>
                            </div>
                        </div>
                    </div>

                    <div class="entry-content">
                    {!! $story->description !!}
                    </div>
                    <section>
                        <div class="">
                             <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1owLkF6slx8U7OSK5v8-HRUzs1JcDrcvh" width="640" height="480"></iframe>
                        </div>
                    </section>

                    
                    <div class="post-share-alt u-margin-t-40 tex-center" style="margin: 20px auto;">
                        Share on:
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                       
            
                    </div>
                </div>
                </div> <!--//.stories-box  -->

                <div class="stories-box3 u-padding-t-50">
                    <div class="stories-box3__top">
                        <h4><span>Related news</span></h4>
                    </div>

                    <div class="stories-list has-post-block">

                    @foreach($relatedStories as $story)
                        <article class="post-item">
                            <figure>
                                <a href="{{ route('stories.single', $story->slug) }}"><img src="{{ asset('images/stories/' . $story->file) }}" alt=""></a>
                            </figure>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#" class="post-auth"><i class="fa fa-user"></i>{{ $story->user['name'] }}</a>
                                    <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ $story->created_at->format('d/m/Y') }}  </time>
                                </div>
                                <h4 class="post-title"><a href="{{ route('stories.single', $story->slug) }}">{{$story->title}}</a></h4>
                                <p class="post-excerpt">
                                    {{ substr(strip_tags($story->description), 0, 100) }}{{ strlen(strip_tags($story->description)) > 100 ? "..." : "" }}
                                </p>
                            </div>
                        </article>

                    @endforeach
                    </div><!--//.stories-list -->

                </div>
            </div>
            @include('frontend.partials.side_bar')
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
$(function() {
    $(".sidebar--right").stick_in_parent();
    $('.sidebar--right')
    .on('sticky_kit:bottom', function(e) {
        $(this).parent().css('position', 'static');
    })
    .on('sticky_kit:unbottom', function(e) {
        $(this).parent().css('position', 'relative');
    });
});

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