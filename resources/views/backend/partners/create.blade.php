@extends('backend.layouts.admin')

@section('title', '| Partner')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .partner-image {
    border: 5px solid #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
    width: 250px;
    height: 250px;
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
  {!! Form::open(array('route' => 'partners.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        <div class="col-md-6 col-lg-6">
        {{ Form::label('name', trans('backend.title'), ['class' => 'form-spacing-top']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('description', null, array('class' => 'form-control my-editor')) }}
       
        {{ Form::label('website', "Website:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('website', null, ['class' => 'form-control']) }}
      
        {{ Form::label('address', "Address:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-6 col-lg-6">
          {{ Form::label('image', 'Image/Logo:', ['class' => 'form-spacing-top']) }}
          {{ Form::file('image', ['id' => 'jpartner']) }}
          <p>
              <span id="imageerror" style="font-weight: bold; color: red"></span>
          </p>
          <div class="row form-spacing-top">
            <img class="partner-image" id="uploadedimage" src="">
          </div>

          {{ Form::submit(trans('backend.publish'), ['class' => 'btn btn-success btn-lg form-spacing']) }}
        </div>

  {!! Form::close() !!}
  </div> <!-- end of .row (form) -->

@stop

@section('scripts')

  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jpartner").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 700000) {
                         $('#imageerror').text('Image too large');
                         $jpartner = $("#jpartner");
                         $jpartner.val("");
                         $jpartner.wrap('<form>').closest('form').get(0).reset();
                         $jpartner.unwrap();
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
