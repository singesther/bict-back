@extends('backend.layouts.admin')

@section('title', '| Team')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
<style type="text/css">
  .team-img {
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
      <h3>@lang('backend.add_new') @lang('backend.member')</h3>
    <hr>
    </div>
  </div>

  <div class="row modify-row-margin">
  {!! Form::open(array('route' => 'team.store', 'data-parsley-validate' => '', 'files' => true)) !!}
      <div class="col-lg-8 col-lg-offset-2">
        <div class="col-lg-6">
          {{ Form::label('name', 'Name:', ['class' => 'form-spacing-top']) }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
 
          {{ Form::label('email', 'Email:', ['class' => 'form-spacing-top']) }}
          {{ Form::text('email', null, ['class' => 'form-control']) }}

          <div class="hidden">
            {{ Form::label('roles', 'roles:', ['class' => 'form-spacing-top']) }}
            <select class="form-control select2-multi" name="roles[]" multiple="multiple">
              @foreach($roles as $role)
                <option value='{{ $role->id }}'>{{ $role->display_name }}</option>
              @endforeach
            </select>
          </div>

          {{ Form::label('position', "Position:", ['class' => 'form-spacing-top']) }}
          {{ Form::text('position', null, ['class' => 'form-control']) }}

          <label>Group</label>
          <select class="form-control" id="listingwho" name="group">
            <option value="">-- Select Group --</option>
            <option value="National Team">National Team</option>
            <option value="District Coordinator">District Coordinator</option>
          </select> 
        </div>

        <div class="col-lg-6">
          {{ Form::label('profile_image', 'New Member Image:', ['class' => 'form-spacing-top']) }}
          {{ Form::file('profile_image', ['id' => 'jimage']) }}
          <p>
              <span id="imageerror" style="font-weight: bold; color: red"></span>
          </p>
          <div class="form-spacing-top">
            <img class="team-img" id="uploadedimage" src="/images/default-avatar.png">
          </div>
        </div>
        
        <div class="col-lg-12">
          {{ Form::label('about', "About:", ['class' => 'form-spacing-top']) }}
          {{ Form::textarea('about', null, ['class' => 'form-control']) }}
          <div class="pull-left form-spacing">
            {{ Form::submit('Save member', ['class' => 'btn btn-success btn-block btn-spacing']) }}
          </div>
        </div>
      </div>

  {!! Form::close() !!}
  </div> <!-- end of .row (form) -->
@stop

@section('scripts')


  {!! Html::script('/js/parsley.min.js') !!}
  {!! Html::script('/js/select2.min.js') !!}

  <script type="text/javascript">
    $(".select2-multi").select2();
  </script>
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
