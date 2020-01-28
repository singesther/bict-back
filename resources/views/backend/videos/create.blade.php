@extends('backend.layouts.admin')

@section('title', '| Videos')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .video-image {
    /*max-width: 150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);*/
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin form-spacing-bottom">
  {!! Form::open(array('route' => 'videos.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        <div class="col-lg-8">
          {{ Form::label('title', "Title:", ['class' => 'form-spacing-top']) }}
          {{ Form::text('title', null, ['class' => 'form-control']) }}
          {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
          {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>
       
        <div class="col-lg-4">
          {{ Form::label('video_code', "Youtube Embedded Video Code", ['class' => 'form-spacing-top']) }}
          {{ Form::textarea('video_code', null, ['class' => 'form-control', 'placeholder' =>'Example: <iframe width="560" height="315" src="https://www.youtube.com/embed/axJ2F3OjzMc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>']) }}
          
          {{ Form::submit('Save video', ['class' => 'btn btn-success form-spacing btn-block']) }}
        </div>

  {!! Form::close() !!}
  </div> <!-- end of .row (form) -->

@stop

@section('scripts')

  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jvideo").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     // if (e.total > 700000) {
                     //     $('#imageerror').text('Image too large');
                     //     $jvideo = $("#jvideo");
                     //     $jvideo.val("");
                     //     $jvideo.wrap('<form>').closest('form').get(0).reset();
                     //     $jvideo.unwrap();
                     //     $('#uploadedimage').removeAttr('src');
                     //     return;
                     // }
                     $('#imageerror').text('');
                     document.getElementById("uploadedimage").src = e.target.result;
                 };
                 reader.readAsDataURL(this.files[0]);
             };
         });
  </script>
@endsection
