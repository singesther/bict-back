@extends('backend.layouts.admin')

@section('title', '| Gallery')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .gallery-image {
    max-width: 150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
  .gallery-img {
    width: 480px;
    height: 360px;
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
    <div class="col-md-12">
      <h3>@lang('backend.add_new') - @lang('backend.picture')</h3>
    <hr>
    </div>
  </div>

  <div class="row modify-row-margin form-spacing">
  {!! Form::open(array('route' => 'gallery.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        <div class="col-md-6 col-lg-6">
          {{ Form::label('title', "Title:", ['class' => '']) }}
          {{ Form::text('title', null, ['class' => 'form-control']) }}
          
          {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
          {{ Form::textarea('description', null, ['class' => 'form-control']) }}
         </div>
        <div class="col-lg-6">
          {{ Form::label('picture', 'Gallery:', ['class' => 'form-spacing-top']) }}
          {{ Form::file('picture', ['id' => 'jgallery']) }}
          <p>
              <span id="imageerror" style="font-weight: bold; color: red"></span>
          </p>
          <div class="form-spacing-top">
            <img class="gallery-img" id="uploadedimage" src="/images/default.png">
          </div>

          <div class="pull-left form-spacing">
            {{ Form::submit('Save gallery', ['class' => 'btn btn-success btn-block btn-spacing']) }}
          </div>
        </div>

  {!! Form::close() !!}
  </div> <!-- end of .row (form) -->

@stop

@section('scripts')

  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jgallery").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 70000000) {
                         $('#imageerror').text('Image too large');
                         $jgallery = $("#jgallery");
                         $jgallery.val("");
                         $jgallery.wrap('<form>').closest('form').get(0).reset();
                         $jgallery.unwrap();
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
