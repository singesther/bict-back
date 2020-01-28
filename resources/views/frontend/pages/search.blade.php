@extends('frontend.layouts.main')

@section('title', '| Search')

@section('styles')
<link rel="stylesheet" type="text/css" href="/frontend/css/newstoday-r.css" />
<style>
/*REQUIRED*/
.search-row{
    margin-bottom: 10px;
}

.inside-row {
    padding: 0;
    background-color: #ffffff;
    min-height: 150px;
    border: 1px solid #e7e7e7;
    overflow: hidden;
    height: auto;
    position: relative;
}


.search-image {
    width: 150px;
    height: 150px;
    float: left;
    display: inline-block;
}

.search-image a img{
    width: 100%;
    height: 100%;
}

.search-image li {
    border-radius: 0;
    width: 20px;
    height: 6px;
}


.search-content {
    position: absolute;
    top: 0;
    left: 20%;
    display: block;
    float: left;
    width: 80%;
    max-height: 76%;
    padding: 1.5% 2% 2% 2%;
    overflow-y: auto;
}

.search-content h4 {
    margin-bottom: 3px;
    margin-top: 0;
}

.content-footer {
    position: absolute;
    bottom: 0;
    left: 20%;
    width: 78%;
    height: 20%;
    margin: 1%;
}

/* Scrollbars */
.search-content::-webkit-scrollbar {
  width: 5px;
}
 
.search-content::-webkit-scrollbar-thumb:vertical {
  margin: 5px;
  background-color: #999;
  -webkit-border-radius: 5px;
}
 
.search-content::-webkit-scrollbar-button:start:decrement,
.search-content::-webkit-scrollbar-button:end:increment {
  height: 5px;
  display: block;
}
</style>
@endsection

@section('content')
<section class="has-sidebar" style="margin: 30px 0px;">
<!-- pages -->
<div class="container">
	<div class="row">
	    <div class="col-lg-8 col-md-8">
	    	@if($posts->count() > 0)
	        <h4>Your search result are {{$posts->count()}}</h4>
	    	<hr>
			    <!-- Begin of rows -->
			    @foreach($posts as $post)
			    <div class="row search-row">
			    	<div class="inside-row">
			            <div class="search-image">
			              <!-- Wrapper for slides -->
			                <a href="{{ url('articles/'.$post->slug) }}">
							<img src="{{ asset('images/posts/'. $post->thumbnail)}}"></a>
			            </div>
			            <div class="search-content">
			                <h4>{{ $post->title }}</h4>
			                <p>
			                   {{ substr(strip_tags($post->body), 0, 110) }}{{ strlen(strip_tags($post->body)) > 110 ? '...' : "" }}
			                </p>
			            </div>
			            <div class="content-footer">
			                <span class="pull-right buttons">
			                    <a href="">Read more</a>
			                </span>
			            </div>
			        </div>
	            </div>
	            @endforeach
				<div class="">
					<div class="text-center">
						{!! $posts->links() !!}
					</div>
				</div>
	        @else
				<h2 class="text-center">No result found!</h2>
				<h3 class="text-center">Search again</h3>
			@endif
   		</div>
        @include('frontend.partials.side_bar')
    </div>
</section>
<!-- //pages -->
@endsection



@section('scripts')

@endsection