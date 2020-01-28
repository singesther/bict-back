@extends('backend.layouts.admin')

@section('title', '| All Categories')

@section('stylesheets')
<style type="text/css">
  .category-image {
    width: 32px;
    height: 32px;
  }
</style>
@endsection


@section('content')
	<div class="row modify-row-margin">
  		<div class="col-md-4">
  		    <h4> Add New Category</h4>

		{!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => true]) !!}
			{{ Form::label('name', 'Name:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}	

			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'slug form-control']) }}

		{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-h1-spacing pull-right form-spacing']) }}
  		</div>
	  	<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Url</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1; ?>
					@foreach ($categories as $category)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $category->name }}</td>
						<td><a href="{{ route('categories.show', $category->slug) }}">{{ route('categories.show', $category->slug) }}</a></td>
						<td>{{ date('M j, Y', strtotime($category->created_at)) }}</td>
						<td>
							<a href="{{ route('categories.show', $category->id) }}" class="btn btn-success" v-bind:title="messageshow"><span class="fa fa-eye"></span></a>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary" v-bind:title="messageedit"><span class="fa fa-pencil"></span></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	</div>
@endsection

@section('scripts')
<script src="/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
  <script>
  var app = new Vue({
    el: '#myapp',
    data: {
      messageshow: 'Show',
      messageedit: 'Edit',
    }
  });
</script>

<script src="/js/jquery.slugify.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	$().ready(function () {
		$('.slug').slugify('#name');
	}); 
</script>
<!-- Preview of image uploaded -->
<script>
	 $(document).ready(function() {
		 document.getElementById("jimage").onchange = function () {
			 var reader = new FileReader();

			 reader.onload = function (e) {
				if (e.total > 250000) {
					 $('#imageerror').text('Image too large');
					 $jimage = $("#jimage");
					 $jimage.val("");
					 $jimage.wrap('<form>').closest('form').get(0).reset();
					 $jimage.unwrap();
					 $('#uploadedimage').removeAttr('src');
					 return;
				 }
				 $('#imageerror').text('');
				 document.getElementById("uploadedimage").src = e.target.result;
			 };
			 reader.readAsDataURL(this.files[0]);
		 };
	 });
</script>
@endsection

