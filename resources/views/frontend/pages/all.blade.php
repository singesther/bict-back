@extends('frontend.layouts.page')

@section('title', '| Pages')

@section('stylesheets')
<style type="text/css">

</style>
@endsection

@section('page')
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Pages</h1>
		</div>
	</div>
	<div class="row">
	@foreach ($pages as $page)
		<div class="col-md-4">
			<div class="category-card" style="background-color:#cccccc;">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="border-top:2px solid white; padding:10px;">
							<p><a href="{{ route('pages.show', $page->slug) }}">
								{{ $page->title }}</a></p>
						</h3>
					</div>
				</div>
			</div>
		</div>
	@endforeach
    </div>


@endsection
