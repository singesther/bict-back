@extends('backend.layouts.admin')

@section('title', '| Edit Activity')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
  <style type="text/css">
    .activity-image {
      width: 100%;
      height: 200px;
    }
  </style>
@endsection


@section('content')
<div class="row modify-row-margin form-spacing-bottom form-spacing">
  {!! Form::model($activity, ['route' => ['activities.update', $activity->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ["class" => 'form-control']) }}

      {{ Form::label('program_id', 'Select a program', ['class' => 'form-spacing-top']) }}
      {{ Form::select('program_id', $programs, null, ['class' => 'form-control']) }}

      {{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('description', null, ['class' => 'form-control my-editor']) }}
    </div>

    <div class="col-md-4">
      <label>Status</label>
      <select class="form-control" id="status" name="status">
          <option value="upcoming">Upcoming activity</option>
          <option value="current">Current activity</option>
          <option value="last">Last activity</option>
      </select> 

      {{ Form::label('date', 'Date of activity:', ['class' => 'form-spacing-top']) }}
      {{ Form::text('date', $activity->date, array('class' => 'form-control date-picker')) }}

      <label for="location" class="form-spacing form-spacing-top">District</label>
      <select class="form-control" id="district" name="district">
        <option selected="selected" value="{{$activity->district}}">{{$activity->district}}</option>
        <optgroup label="City of Kigali">
          <option value="Gasabo">Gasabo</option>
          <option value="Kicukiro">Kicukiro</option>
          <option value="Nyarugenge">Nyarugenge</option>
        </optgroup>
        <optgroup label="Eastern Province">
          <option value="Bugesera">Bugesera</option>
          <option value="Gatsibo">Gatsibo</option>
          <option value="Kayonza">Kayonza</option>
          <option value="Kirehe">Kirehe</option>          
          <option value="Ngoma">Ngoma</option>
          <option value="Nyagatare">Nyagatare</option>
          <option value="Rwamagana">Rwamagana</option>      
        </optgroup>
        <optgroup label="Northern Province">
          <option value="Burera">Burera</option>
          <option value="Gakenke">Gakenke</option>
          <option value="Gicumbi">Gicumbi</option>
          <option value="Musanze">Musanze</option>
          <option value="Rulindo">Rulindo</option>    
        </optgroup>
        <optgroup label="Southern Province">
          <option value="Gisagara">Gisagara</option>
          <option value="Huye">Huye</option>
          <option value="Kamonyi">Kamonyi</option>
          <option value="Muhanga">Muhanga</option>        
          <option value="Nyamagabe">Nyamagabe</option>
          <option value="Nyanza">Nyanza</option>
          <option value="Nyaruguru">Nyaruguru</option>
          <option value="Ruhango">Ruhango</option>         
       
        </optgroup>
        <optgroup label="Western Province">
          <option value="Karongi">Karongi</option>
          <option value="Ngororero">Ngororero</option>
          <option value="Nyabihu">Nyabihu</option>
          <option value="Nyamasheke">Nyamasheke</option>       
          <option value="Rubavu">Rubavu</option>
          <option value="Rusizi">Rusizi</option>
          <option value="Rutsiro">Rutsiro</option>  
        </optgroup>

      </select>

      {{ Form::label('file', 'Update Featured File:', ['class' => 'form-spacing-top']) }}
      {{ Form::file('file', ['id' => 'jfile']) }}

      <img class="activity-image form-spacing-top" id="uploadedfile" src="{{ asset('images/activities/' . $activity->file_name) }}">
      <p>
          <span id="fileerror" style="font-weight: bold; color: red"></span>
      </p>
      <div class="row">
        <div class="col-sm-6">
          {!! Html::linkRoute('activities.show', trans('backend.show'), array($activity->id), array('class' => 'btn btn-danger btn-block')) !!}
        </div>
        <div class="col-sm-6">
          {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success btn-block']) }}
          </div>
      </div>
    </div>
    {!! Form::close() !!}
</div> <!-- end of .row (form) -->
@stop

@section('scripts')
  <script src="/datepicker/jquery.datetimepicker.full.js"></script>
  <script>
  $('.date-picker').datetimepicker();
  </script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
      var editor_config = {
      path_absolute : "/",
      selector: "textarea",
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
      image_advtab: true,
      templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
  <!-- Preview of file uploaded -->
	<script>
		 $(document).ready(function() {
				 document.getElementById("jfile").onchange = function () {
						 var reader = new FileReader();

						 reader.onload = function (e) {
								 if (e.total > 2500000000) {
										 $('#fileerror').text('File too large');
										 $jfile = $("#jfile");
										 $jfile.val("");
										 $jfile.wrap('<form>').closest('form').get(0).reset();
										 $jfile.unwrap();
										 $('#uploadedfile').removeAttr('src');
										 return;
								 }
								 $('#fileerror').text('');
								 document.getElementById("uploadedfile").src = e.target.result;
						 };
						 reader.readAsDataURL(this.files[0]);
				 };
		 });
	</script>


@endsection
