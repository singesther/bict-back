@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($club->title); ?>
@section('title', "| $titleTag")

@section('styles')
<meta property="og:title" content="{{ $club->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($club->body), 0, 60) }}"/>
<meta property="og:url" content="{{ url('clubs/'.$club->slug) }}"/>
<meta property="og:image" content="{{ asset('images/clubs/' . $club->thumbnail) }}"/>
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
                    <div class="m-club-content m-club-content--tok">
                        <div class="club-top">
                            <h1 class="club-title">{{ $club->title }} </h1>
                            <div class="club-meta">
                                <div class="item">
                                    <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ $club->created_at->format('d/m/Y') }}</time>
                                </div>
                            </div>
                        </div>

                        <div class="entry-content">
                        {!! $club->body !!}
                        </div>

                        <div class="club-share-alt u-margin-t-40">
                            <h6>Share :</h6>
                            <div class="share-links social--color">
                                <a class="social__facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a class="social__google-plus" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a class="social__twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            
                        </div>
                    </div>
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
            
            var form = '<form method="club" action="{{URL::to("replies")}}' + '/' +article_id+'"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+cid+'"><div class="col-md-6 input-left"><div class="form-group"><input type="text" name="name" class="form-control" placeholder="Full Name" ></div></div><div class="col-md-6 input-right"><div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div></div><div class="form-group"><textarea class="form-control" name="reply" placeholder="Your Comment" > </textarea> </div> <div class="form-group"> <input class="btn c-btn--color-brand" type="submit" value="Reply"> </div></form>';

            comment_content.find(".reply-form").append(form);
        });

        $(".comments-box").delegate(".reply-to-reply","click",function(){

            var comment_content = $(this).parent().parent();
            var cid = $(this).attr("rid");
            var token = $(this).attr("token")
            var article_id = $(this).attr('article_rid');

            // document.getElementById("hiddenVal").value = article_id;

            var form = '<form method="club" action="{{url("replies")}}' + '/' +article_id+'"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+cid+'"><div class="col-md-6 input-left"><div class="form-group"><input type="text" name="name" class="form-control" placeholder="Full Name" ></div></div><div class="col-md-6 input-right"><div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div></div><div class="form-group"><textarea class="form-control" name="reply" placeholder="Your Comment" > </textarea> </div> <div class="form-group"> <input class="btn c-btn--color-brand" type="submit" value="Reply"> </div></form>';

            comment_content.find(".reply-to-reply-form").append(form);

        });
    }); 
</script>
@endsection