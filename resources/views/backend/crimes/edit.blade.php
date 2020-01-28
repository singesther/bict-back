@extends('backend.layouts.admin')

@section('title', '| Edit Crime')

@section('stylesheets')
  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
  <style type="text/css">
    .crime-image {
      width: 480px;
      height: 360px;
    }
  </style>
@endsection


@section('content')
<div class="row modify-row-margin form-spacing-bottom form-spacing">
  {!! Form::model($crime, ['route' => ['crimes.update', $crime->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}

      {{ Form::label('description', "Body:", ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('description', null, ['class' => 'form-control my-editor']) }}

      <div class="row form-spacing-top">
        <div class="col-md-7">
          {{ Form::label('file', 'Update Featured File:', ['class' => '']) }}
          {{ Form::file('file', ['id' => 'jfile']) }}
            <img class="crime-image form-spacing-top" id="uploadedfile" src="{{ asset('images/crimes/' . $crime->file) }}" style="width: 480px;height: 360px;">
          <p>
              <span id="fileerror" style="font-weight: bold; color: red"></span>
          </p>
        </div>
        <div class="col-md-3">
          <label class="" name="language">Language</label>
          <select name="language" id="countries" style="width:160px;">
            <option value="en" <?php if($crime->lang == 'en') echo 'selected = "selected"'?>data-image="/images/flags/gh_flag_en.gif"> 
               English
            </option>
            <option value="fr" <?php if($crime->lang == 'fr') echo 'selected = "selected"'?> data-image="/images/flags/gh_flag_fr.png"> 
               Français
            </option>
          </select>
        </div>
        <div class="col-md-2">
        {{ Form::label('live', trans('backend.publish'), ['class' => 'form-spacing-top']) }}
        {{ Form::checkbox('live', 1, true) }}
        </div>

      </div>


    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Create At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($crime->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('crimes.show', trans('backend.show'), array($crime->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success btn-block']) }}
            </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
</div> <!-- end of .row (form) -->
@stop

@section('scripts')
 
  </script>

	{!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $(".select2-multi").select2();
  </script>
  <script src="/js/jquery.slugify.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf-8">
    $().ready(function () {
      $('.slug').slugify('#title');
    }); 
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

  <script src="/datepicker/jquery.datetimepicker.full.js"></script>
	<script>
	$('.date-picker').datetimepicker();
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
