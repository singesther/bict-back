@extends('frontend.layouts.main')

@section('title', '| Categories')

@section('styles')
<style type="text/css">
	.category-image {
   	 	width: 300px;
    	height: 225px;
	}

  	.category-card{
		position: relative;
		overflow: hidden;
		margin-bottom: 20px;
		cursor: pointer;
	}

	.category-card .caption{
		position: absolute;
		top:150px;
		width: 100%;
	}

	.category-card .blur{
		background-color: rgba(62, 141, 155, 0.59);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.category-card .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}
	.category-card .caption-text p a{
		color: #ffffff;
	}

	.category-card .caption-text p a:hover{
		color: #C0FB12; 
		text-decoration: none;
	}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="section-heading">
            <h2 class="entry-title">Categories</h2>
        </div>
	</div>

	<div class="row">
		@foreach ($categories as $category)
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="category-card" style="background-color:#cccccc;">
				<div>
					<a href="{{ route('categories.show', $category->slug) }}"><img src="{{ asset('images/categories/'. $category->image)}}" alt="{{ $category->name }}" class="category-image img-responsive"/></a>
				</div>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="border-top:2px solid white; padding:10px;">
							<p><a href="{{ route('categories.show', $category->slug) }}">
								{{ $category->name }}</a></p>
						</h3>
					</div>
				</div>
			</div>
		</div>
			
		@endforeach
	</div>
</div>


@endsection
