@extends('backend.layouts.admin')

@section('title', '| Edit Gallery')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .gallery-picture {
    width: 480px;
    height: 360px;
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
    <div class="col-md-12">
      <h3>@lang('backend.edit') - @lang('backend.picture')</h3>
    <hr>
    </div>
  </div>

  <div class="row modify-row-margin form-spacing">
  {!! Form::model($gallery, ['route' => ['gallery.update', $gallery->id], 'method' => 'PUT', 'files' => true]) !!}
      <div class="col-lg-6">
        {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
       
        {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        
        {{ Form::label('live', 'Live: ', ['class' => '']) }}
        {{ Form::checkbox('live', 1, true) }}
      </div>
      <div class="col-lg-6">
        {{ Form::label('picture', 'Gallery:', ['class' => 'form-spacing-top']) }}
        {{ Form::file('picture', ['id' => 'jimage']) }}
        <p>
            <span id="imageerror" style="font-weight: bold; color: red"></span>
        </p>

        <div class="row form-spacing">
          <img class="gallery-picture" id="uploadedimage" src="{{ asset('images/gallery/'.$gallery->file_name) }}">
        </div>

        <div class="pull-left form-spacing">
          {{ Form::submit('Save picture', ['class' => 'btn btn-success btn-block btn-spacing']) }}
        </div>
      </div>
      
  {!! Form::close() !!}
  </div> <!-- end of .row (form) -->
  
@stop

@section('scripts')

  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 70000000) {
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
