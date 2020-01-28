@extends('backend.layouts.admin')

@section('title', '| Edit Partner')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .partner-picture {
    width: 250px;
    height: 250px;
  }
</style>
@endsection


@section('content')

  <div class="row modify-row-margin">
    <div class="col-md-12">
      <h3>@lang('backend.edit') - @lang('backend.member')</h3>
    <hr>
    </div>
  </div>

  <div class="row modify-row-margin">
  {!! Form::model($partner, ['route' => ['partners.update', $partner->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-lg-8 col-lg-offset-2">
      <div class="col-lg-6">
        {{ Form::label('name', 'Name:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('description', null, array('class' => 'form-control my-editor')) }}
       
        {{ Form::label('website', "Website:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('website', null, ['class' => 'form-control']) }}
       
        {{ Form::label('address', "Address:", ['class' => 'form-spacing-top']) }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
        
        {{ Form::label('live', 'Live: ', ['class' => 'form-spacing-top']) }}
        {{ Form::checkbox('live', 1, true) }}
      </div>

      <div class="col-lg-6">
        {{ Form::label('image', 'Image or Logo:', ['class' => 'form-spacing-top']) }}
        {{ Form::file('image', ['id' => 'jimage']) }}
        <p>
            <span id="imageerror" style="font-weight: bold; color: red"></span>
        </p>
        <div class="row form-spacing-top">
          <img class="partner-picture" id="uploadedimage" src="{{ asset('images/partners/'.$partner->logo) }}">
        </div>
        <div class="pull-right form-spacing">
          {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success btn-block']) }}
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
