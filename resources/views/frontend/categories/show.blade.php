@extends('frontend.layouts.main')

<?php $titleTag = htmlspecialchars($category->name); ?>
@section('title', "| $titleTag")

@section('styles')
<style type="text/css">
	.post-image {
   	 	width: 300px;
    	height: 225px;
	}
	.post-card{
    	padding: 0px;
		position: relative;
		overflow: hidden;
		height: 200px;
		margin-bottom: 20px;
		cursor: pointer;
	}
	.post-card:hover .caption{
		opacity: 1;
		transform: translateY(-100px);
		-webkit-transform:translateY(-100px);
		-moz-transform:translateY(-100px);
		-ms-transform:translateY(-100px);
		-o-transform:translateY(-100px);
	}

	.post-card .caption-text a{
		color: #ffffff;
	}

	.post-card .caption-text p a:hover{
		text-decoration: none;
	}

	.post-card img{
		z-index: 4;
	}
	.post-card .caption{
		position: absolute;
		top:150px;
		-webkit-transition:all 0.3s ease-in-out;
		-moz-transition:all 0.3s ease-in-out;
		-o-transition:all 0.3s ease-in-out;
		-ms-transition:all 0.3s ease-in-out;
		transition:all 0.3s ease-in-out;
		width: 100%;
	}
	.post-card .blur{
		background-color: rgba(62, 141, 155, 0.59);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.post-card .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}

</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>{{ $category->name }}</h1>
		</div>
	</div>
	
	<div class="row">
		@foreach ($category->posts as $post)
		
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="post-card " style="background-color:#cccccc;">
					<img src="{{ asset('images/posts/'. $post->thumbnail)}}" alt="{{ $post->title }}" class="post-image img-responsive"/>
					
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h3><a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a></h3>
							<p><a href="{{ route('posts.single', $post->slug) }}"> </a></p>
							<!-- <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Soma Birambuye</a> -->
						</div>
					</div>
				</div>
			</div>

		@endforeach
	</div>
</div>

@endsection
