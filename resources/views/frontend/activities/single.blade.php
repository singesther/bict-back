@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($activity->title); ?>
@section('title', "| $titleTag")

@section('styles')
<meta property="og:title" content="{{ $activity->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($activity->body), 0, 60) }}"/>
<meta property="og:url" content="{{ url('activities/'.$activity->slug) }}"/>
<meta property="og:image" content="{{ asset('images/activities/'. $activity->file_name)}}"/>
<meta property="og:type" content="page" />

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
<section class="has-sidebar">
    <div class="container">
        <div class="row" data-sticky_parent="" style="position: relative;">

            <div class="col-lg-8 col-md-8 content-wrapper">
                <div data-sticky_column="">
                    <div class="m-post-content m-post-content--tok">
                        <div class="post-top">
                            <h4 class="post-title">{{ $activity->title }} </h4>
                            <div class="post-meta">
                                <div class="item">
                                    <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{ $activity->created_at->format('d/m/Y') }}</time>
                                </div>
                            </div>
                            <div>
                                <a href="">
                                    <img src="{{ asset('images/activities/'. $activity->file_name)}}"
                                    alt="{{ $activity->title }}" class="activity-image img-responsive"/></a>

                                <p>{!! $activity->description !!}</p>
                            </div>
                            
                        </div>

                        <div class="entry-content">
                        {!! $activity->description !!}
                        </div>

                        <div class="post-share-alt u-margin-t-40 tex-center" style="margin: 20px auto;">
                            Share on:
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            
                        </div>
                    </div>
                </div>
            </div>
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

</script>
@endsection