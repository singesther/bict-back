@extends('frontend.layouts.page')

<?php $titleTag = htmlspecialchars($page->title); ?>
@section('title', "| $titleTag")

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/pages/style.css" />
<link rel="stylesheet" type="text/css" href="/css/pages/responsive.css" />
<meta property="og:title" content="{{ $page->title }}"/>
<meta property="og:description" content="{{ substr(strip_tags($page->body), 0, 60) }}"/>
<meta property="og:url" content="{{ url('pages/'.$page->slug) }}"/>
<meta property="og:image" content="{{ $page->image }}"/>
<meta property="og:type" content="page" />
<style type="text/css">
/*	.thumbnail {
    padding:0px;
}*/
</style>
@endsection

@section('content')
<div class="single-page news-page">
     <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Page</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="news-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
					<h1 class="heading"><a href="">{{ $page->title }}</a></h1>
						
					<div class="page-content">
						{!! $page->body !!}
					</div>

					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection