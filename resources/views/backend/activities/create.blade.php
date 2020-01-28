@extends('backend.layouts.admin')

@section('title', '| Create New Activity')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .project-image {
    width: 250px;
	height: 200px;
	border:1px dashed #000;
 }
</style>
@endsection

@section('content')
	<div class="row modify-row-margin">
		<div class="col-md-12">
			<h3>@lang('backend.add_new') activity</h3>
		<hr>
		</div>
	</div>
	<div class="row modify-row-margin">
	 	{!! Form::open(array('route' => 'activities.store', 'data-parsley-validate' => '', 'files' => true)) !!}
	 	<div class="col-md-8">
			{{ Form::label('title', trans('backend.title')) }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}

	        {{ Form::label('program_id', 'Select a program', ['class' => 'form-spacing-top']) }}
	        <select class="form-control" name="program_id">
				@foreach($programs as $program)
					<option value='{{ $program->id }}'>{{ $program->title }}</option>
				@endforeach
			</select>

			{{ Form::label('description', "Description:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('description', null, array('class' => 'form-control my-editor')) }}
		</div>
		<div class="col-md-4">
			<label>Status</label>
	        <select class="form-control" id="status" name="status">
	            <option value="upcoming">Upcoming event</option>
	            <option value="current">Current event</option>
	            <option value="last">Last event</option>
	        </select> 

			<label for="date" class="form-spacing form-spacing-top">Date of activity</label>
			{{ Form::text('date', '', array('class' => 'form-control date-picker')) }}


			@role('admin|secretary')
			<label for="location" class="form-spacing form-spacing-top">District</label>
			<select class="form-control" id="location-district" name="location-district">
		  		<option selected="selected" value="">--Select One--</option>
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
			@endrole

			<div class="form-spacing-top">
			{{ Form::label('file', trans('backend.upload_image') , ['class' => '']) }}
			{{ Form::file('file', ['id' => 'jfile']) }}

			<img src="/images/default.png" class="project-image form-spacing-top" id="uploadedfile" style="width:250px">
			<p>
					<span id="fileerror" style="font-weight: bold; color: red"></span>
			</p>
			</div>
				
			{{ Form::submit(trans('backend.publish'), array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>
</div>
</div>
@endsection


@section('scripts')

<script src="/datepicker/jquery.datetimepicker.full.js"></script>
<script>
$('.date-picker').datetimepicker();
</script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <!-- <script src="/tinymce/js/tinymce/tinymce.min.js"></script> -->
<script>
	window.onload = function() {
    // access Dropzone here
	var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
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
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('description')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('description')[0].clientHeight;

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
};

</script>
	<!-- Preview of file uploaded -->
	<script>
		 $(document).ready(function() {
			 document.getElementById("jfile").onchange = function () {
					 var reader = new FileReader();

					 reader.onload = function (e) {
							 if (e.total > 25000000) {
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
