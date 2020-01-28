@extends('backend.layouts.admin')

@section('title', '| Edit Gallery')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .testimonial-img {
    width: 200px;
    height: 200px;
    border: 5px solid #fff;
    border-radius: 50%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
    <div class="col-md-12">
      <h3>@lang('backend.edit') - Testimonial</h3>
    <hr>
    </div>
  </div>

  <div class="row modify-row-margin form-spacing">
  {!! Form::model($testimonial, ['route' => ['testimonials.update', $testimonial->id], 'method' => 'PUT', 'files' => true]) !!}
      <div class="col-lg-6">
        {{ Form::label('creator_name', "Creator Name: *", ['class' => '']) }}
        {{ Form::text('creator_name', null, ['class' => 'form-control']) }}

        {{ Form::label('creator_position', "Creator Position:", ['class' => '']) }}
        {{ Form::text('creator_position', null, ['class' => 'form-control']) }}

        {{ Form::label('creator_company', "Creator Company: ", ['class' => '']) }}
        {{ Form::text('creator_company', null, ['class' => 'form-control']) }}

        {{ Form::label('creator_link', "Creator Link:", ['class' => '']) }}
        {{ Form::text('creator_link', null, ['class' => 'form-control']) }}
       
        {{ Form::label('description', "Description: *", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        
        {{ Form::label('live', 'Live: ', ['class' => '']) }}
        {{ Form::checkbox('live', 1, true) }}
      </div>
      <div class="col-lg-6">
        {{ Form::label('file_name', 'Creator image:', ['class' => 'form-spacing-top']) }}
        {{ Form::file('file_name', ['id' => 'jimage']) }}
        <p>
            <span id="imageerror" style="font-weight: bold; color: red"></span>
        </p>

        <div class="row form-spacing">
          <img class="testimonial-img" id="uploadedimage" src="{{ asset('images/testimonials/'.$testimonial->file_name) }}">
        </div>

        <div class="pull-left form-spacing">
          {{ Form::submit('Save testimonial', ['class' => 'btn btn-success btn-block btn-spacing']) }}
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
