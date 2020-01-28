@extends('backend.layouts.admin')

@section('title', "| $category->name Category")

@section('stylesheets')
<style type="text/css">
  .article-image {
    width: 32px;
    height: 32px;
  }
</style>
@endsection


@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Icyiriro : {{ $category->name }} <small>{{ $category->articles()->count() }} Articles</small></h1>
			<img class="category-img form-spacing-top" id="uploadedimage" src="{{ asset('images/categories/' . $category->image) }}" width="150px" height= "100px">
		
			<p>
				<span id="imageerror" style="font-weight: bold; color: red"></span>
			</p>
		</div>
		<div class="col-md-2">
			<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
			<a href="{{ route('categories.show', $category->slug) }}" class="btn btn-info pull-right btn-block" style="margin-top:20px;">View in Details</a>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>No</th>
					<th>Image</th>
					<th>Title</th>
					<th></th>
				</thead>

				<tbody>
					<?php $no=1; ?>
					@foreach ($category->articles as $article)
						<tr>
							<td>{{ $no++ }}</td>
							<th><img class="article-image" src="{{ asset('images/'. $article->image) }}"></th>
							<td><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></td>
						</tr>

					@endforeach

				</tbody>
			</table>
		</div>
	</div>


@endsection
