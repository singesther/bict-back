@extends('backend.layouts.admin')

@section('title', '| Create New Program')

@section('stylesheets')
	{!! Html::style('/css/parsley.css') !!}
	{!! Html::style('/css/select2.min.css') !!}
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .program-img {
    width: 250px;
    height: 200px;
  }

</style>
@endsection

@section('content')
	<div class="row modify-row-margin">
		<div class="col-md-12">
			<h3>@lang('backend.add_new') - program</h3>
		<hr>
		</div>
	</div>
	<div class="row modify-row-margin">
		{!! Form::open(array('route' => 'programs.store', 'data-parsley-validate' => '', 'files' => true)) !!}
		<div class="col-md-9">
			{{ Form::label('title', trans('backend.title')) }}
			{{ Form::text('title', null, array('class' => 'form-control', 'id' => 'title', 'required' => '', 'maxlength' => '255')) }}

			{{ Form::label('description', 'Description', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('description', null, array('class' => 'form-control my-editor')) }}
		</div>
		<div class="col-md-3">
	
            {{ Form::label('file_name', 'Upload image for program', ['class' => 'form-spacing-top']) }}
			{{ Form::file('file_name', ['id' => 'jimage']) }}

			<img src="/images/default.png" class="program-img form-spacing-top" id="uploadedimage">
			<p>
				<span id="imageerror" style="font-weight: bold; color: red"></span>
			</p>

			{{ Form::submit(trans('backend.publish'), array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>

	</div>
@endsection


@section('scripts')
    <script src="/js/jquery.slugify.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
		$().ready(function () {
			$('.slug').slugify('#title');
		}); 
	</script>
	<script type="text/javascript">
	    $(function () {
	        $('#datetimepickerDeparture').datetimepicker({
	            daysOfWeekDisabled: [0, 6]
	        });
	    });
	</script>

	<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
	<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
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
};

</script>

{!! Html::script('/js/parsley.min.js') !!}
{!! Html::script('/js/select2.min.js') !!}

<script type="text/javascript">
	$(".select2-multi").select2();
</script>

<script src="/datepicker/jquery.datetimepicker.full.js"></script>
<script>
$('.date-picker').datetimepicker();
</script>

<!-- Preview of image uploaded -->
<script>
	 $(document).ready(function() {
		document.getElementById("jimage").onchange = function () {
			var reader = new FileReader();

			reader.onload = function (e) {
				if (e.total > 250000000) {
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
