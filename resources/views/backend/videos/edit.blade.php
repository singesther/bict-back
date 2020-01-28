@extends('backend.layouts.admin')

@section('title', '| Edit Video')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .video{
 
  }
  .video-image iframe{
    width: 350px;
    height: 250px
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin form-spacing-bottom">
  {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'PUT', 'files' => true]) !!}
      <div class="col-lg-8">
        {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        
        {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('description', null, ['class' => 'form-control']) }}
        
        {{ Form::label('live', 'Live: ', ['class' => 'form-spacing-top']) }}
        {{ Form::checkbox('live', 0, false) }}
      </div>
      <div class="col-lg-4">
        {{ Form::label('video_code', "Youtube Embedded Video Code", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('video_code', null, ['class' => 'form-control', 'placeholder' =>'Example: <iframe width="200" height="200" src="https://www.youtube.com/embed/axJ2F3OjzMc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>']) }}
        <div class="video-image form-spacing">
            {!! $video->video_code !!}
        </div>

        {{ Form::submit('Save video', ['class' => 'btn btn-success btn-block']) }}
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
                     // if (e.total > 7000000) {
                     //     $('#imageerror').text('Image too large');
                     //     $jimage = $("#jimage");
                     //     $jimage.val("");
                     //     $jimage.wrap('<form>').closest('form').get(0).reset();
                     //     $jimage.unwrap();
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
