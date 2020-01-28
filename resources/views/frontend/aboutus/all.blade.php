@extends('frontend.layouts.main')

@section('title', '| About us')

@section('styles')
	<style type="text/css">
		.about-image, .about-details {
		  display: inline-block;
		  vertical-align: top;
		}
		.about-image {
		  width: 33.33333333%;
		  vertical-align: top;
		}
		.about-details {
		  width: 64%;
		  padding-left: 20px;
		}
		.h2 {
		  margin: 0px;
		}
		.about-image img{
			width: 100%;
			height: 200px;
		}
	</style>
@endsection

@section('content')
<div class="container my-content">
	<div class="row">
		<div class="section-heading">
            <h2 class="entry-title">About us</h2>
        </div>
	</div>
	<div class="row">
		@foreach ($abouts as $about)
		<div class="col-md-6">
			<div class="about-subsection">
			<div class="col-md-4 col-xs-12" style="margin: 0px;padding: 0px;">
				<a href="{{ route('abouts.single', $about->slug) }}">
				<img alt="{{ $about->title }}" src="{{ asset('images/abouts/'. $about->thumbnail)}}" style="width: 100%; height: 200px;">  </a>
			</div>
			<div class="col-md-8 col-xs-12">
			    <h4>{{ $about->title }}</h4>       
			    <p style="text-align: justify;text-justify: inter-word;">
			    	{{ substr(strip_tags($about->content), 0, 100) }}
                            {{ strlen(strip_tags($about->content)) > 100 ? "..." : "" }}
			    </p>
			    <a href="{{ route('abouts.single', $about->slug) }}">More</a> 
			</div> 
			</div>
		</div>
		
		@endforeach
    </div>
</div>
@endsection
