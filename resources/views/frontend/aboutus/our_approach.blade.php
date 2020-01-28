@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($ourApproach->title); ?>
@section('title', "| $titleTag")

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/abouts/style.css" />
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

            <div class="col-lg-8 col-md-8 content-wrapper" style="min-height: 500px">
                <div data-sticky_column="">
                    <div class="m-about-content m-about-content--tok">
                        <div class="about-top text-center">
                            <div class="breadcrumbs u-margin-b-10">
                                <span class="current"></span>
                            </div>
                            <h1 class="about-title">{{ $ourApproach->title }}</h1>
                            <p>{!! $ourApproach->content !!}</p>
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

@endsection