@extends('backend.layouts.admin')

@section('title', '| Edit Advert')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .advert-img {
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
    <div class="col-md-12">
    <h3>Edit Advert</h3>
    <hr>
    {!! Form::model($advert, ['route' => ['adverts.update', $advert->id], 'method' => 'PUT', 'files' => true]) !!}
      <div class="col-md-6">
        {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}

        {{ Form::label('url', 'Url:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('url', null, ['class' => 'form-control form-spacing-bottom']) }}

        {{ Form::label('advert_image', 'Advert Image:', ['class' => '']) }}
        {{ Form::file('advert_image', ['id' => 'jimage']) }}
        <p>
            <span id="imageerror" style="font-weight: bold; color: red"></span>
        </p>
      </div>
      <div class="col-md-6">
        {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('description', null, ['class' => 'form-control']) }}
        <div class="">
          {{ Form::label('live', 'Publish: ', ['class' => 'form-spacing-top']) }}
          {{ Form::checkbox('live', 0, false) }}
        </div>
        {{ Form::submit('Save advert', ['class' => 'btn btn-success btn-bottom-spacing']) }}
      </div>
      <div class="col-md-12"> 
        <div class="row form-spacing-bottom">
          <img class="advert-img" id="uploadedimage" src="{{ asset('images/adverts/'.$advert->advert_image) }}">
        </div>
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
                     if (e.total > 700000) {
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
