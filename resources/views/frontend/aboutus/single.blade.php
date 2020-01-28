@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($about->title); ?>
@section('title', "| $titleTag")

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/abouts/style.css" />
<link rel="stylesheet" type="text/css" href="/css/abouts/responsive.css" />
<meta property="og:title" content="{{ $about->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($about->body), 0, 60) }}"/>
<meta property="og:url" content="{{ url('abouts/'.$about->slug) }}"/>
<meta property="og:image" content="{{ asset('images/abouts/' . $about->thumbnail) }}"/>
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

</style>

@endsection


@section('content')
<section class="has-sidebar" style="margin: 30px 0px;">
    <div class="container">
        <div class="row" data-sticky_parent="" style="position: relative;">

            <div class="col-lg-8 col-md-8 content-wrapper">
                <div data-sticky_column="">
                    <div class="m-about-content m-about-content--tok">
                        <div class="about-top">
                            <h1 class="about-title">{{ $about->title }} </h1>
                            <div class="about-meta">
                                <div class="item">
                                    <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i> {{ $about->created_at->format('d/m/Y') }}</time>
                                </div>

                            </div>
                        </div>

                        <div class="entry-content">
                        {!! $about->content !!}
                        </div>

                        <div class="about-share-alt u-margin-t-40">
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

$(document).ready(function() {
    $(".sidebar--right").stick_in_parent();
    $('.sidebar--right')
    .on('sticky_kit:bottom', function(e) {
        $(this).parent().css('position', 'static');
    })
    .on('sticky_kit:unbottom', function(e) {
        $(this).parent().css('position', 'relative');
    });
});
@endsection