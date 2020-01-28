@extends('backend.layouts.admin')

@section('title', '| Edit Page')

@section('stylesheets')
  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
@endsection


@section('content')
<div class="row modify-row-margin form-spacing-bottom form-spacing">
  {!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-md-8">
      {{ Form::label('title', trans('backend.title')) }}
      {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control', 'readonly' => '']) }}

      {{ Form::label('body', trans('backend.content'), ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('body', null, ['class' => 'form-control my-editor']) }}

      
   
    </div>
    <div class="col-md-4">

      {{ Form::label('approved', trans('backend.publish'), ['class' => 'form-spacing']) }}
      {{ Form::checkbox('approved', 1, true) }}

      <br/>

      <div class="well form-spacing-top">
        <dl class="dl-horizontal">
          <dt>Create At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($page->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($page->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row modify-row-margin">
          <div class="col-sm-6">
            {!! Html::linkRoute('pages.show', trans('backend.cancel'), array($page->id), array('class' => 'btn btn-danger btn-block')) !!}
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
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <!-- <script src="/tinymce/js/tinymce/tinymce.min.js"></script> -->
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

	{!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $(".select2-multi").select2();
  </script>

  <script src="/datepicker/jquery.datetimepicker.full.js"></script>
	<script>
	$('.date-picker').datetimepicker();
	</script>

@endsection
