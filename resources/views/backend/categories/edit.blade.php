@extends('backend.layouts.admin')

@section('title', "| Edit Category")

@section('content')
<div class="row modify-row-margin">
    <div class="col-md-12">
		<h3>Edit Category</h3>
    </div>
    <hr>
</div>
<div class="row modify-row-margin">
	<div class="panel-body">
	{{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => "PUT", 'files' => true]) }}
		<div class="col-md-8">
			{{ Form::label('name', "Name:", ['class' => 'form-spacing-top']) }}
			{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'slug form-control']) }}
		</div>
		<div class="col-md-4">
            <div class="form-spacing-bottom">
	          	{{ Form::label('image', 'Upload Category Image:', ['class' => 'form-spacing-top']) }}
				{{ Form::file('image', ['id' => 'jimage']) }}
				<img class="category-img form-spacing-top" id="uploadedimage" src="{{ asset('images/categories/' . $category->image) }}" width="300px" height= "250px">
				<p>
						<span id="imageerror" style="font-weight: bold; color: red"></span>
				</p>
		    </div>
			{{ Form::submit('Save Changes', ['class' => 'btn btn-success form-spacing-top']) }}
	    </div>
	{{ Form::close() }}
</div>
</div>
	
@endsection

@section('scripts')
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