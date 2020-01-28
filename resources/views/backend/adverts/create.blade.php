@extends('backend.layouts.admin')

@section('title', '| Adverts')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .advert-image {
    max-width: 150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
</style>
@endsection


@section('content')
  <div class="row modify-row-margin">
    <div class="col-md-12">
    <h3>Create New Advert</h3>
    <hr>
    {!! Form::open(array('route' => 'adverts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
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
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) }}  
        <div class="">
          {{ Form::label('live', 'Publish: ', ['class' => 'form-spacing-top']) }}
          {{ Form::checkbox('live', 0, false) }}
        </div>
        {{ Form::submit('Save advert', ['class' => 'btn btn-success btn-bottom-spacing']) }}
      </div>
      <div class="col-md-12">
        <div class="row form-spacing-bottom">
          <img class="advert-img" id="uploadedimage" src="">
        </div>
      </div>
    {!! Form::close() !!}
    </div>
  </div>
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
