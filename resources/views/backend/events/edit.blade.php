@extends('backend.layouts.admin')

@section('title', '| Edit Program')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
  <style type="text/css">
  .event-img {
    width: 250px;
    height: 200px;
  }
</style>
@endsection


@section('content')
<div class="row modify-row-margin">
  <div class="col-md-12">
    <h3>@lang('backend.edit') - event</h3>
  <hr>
  </div>
</div>
<div class="row modify-row-margin">
  {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-md-9">
      {{ Form::label('title', trans('backend.title'), ['class' => '']) }}
      {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}

      {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
      {{ Form::text('slug', null, ['class' => 'slug form-control', 'id' => 'slug_input']) }}

      {{ Form::label('description', trans('backend.description'), ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('description', null, ['class' => 'form-control my-editor']) }}
    </div>
    <div class="col-md-3">
        <label>Status</label>
        <select class="form-control" id="status" name="status">
            <option value="upcoming">Upcoming event</option>
            <option value="current">Current event</option>
            <option value="last">Last event</option>
        </select> 

        {{ Form::label('date', 'Date of event:', ['class' => 'form-spacing-top']) }}
        {{ Form::text('date', $event->date, array('class' => 'form-control date-picker')) }}

        <label for="location" class="form-spacing">Location</label>
        {{ Form::text('location', '', array('class' => 'form-control')) }}

        <label for="hosted_by" class="form-spacing">Hosted By</label>
        {{ Form::text('hosted_by', '', array('class' => 'form-control')) }}

        {{ Form::label('file_name', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
        {{ Form::file('file_name', ['id' => 'jimage']) }}

        <img class="event-img form-spacing-top" id="uploadedimage" src="{{ asset('images/events/' . $event->file_name) }}">
        <p>
            <span id="imageerror" style="font-weight: bold; color: red"></span>
        </p>
       
        
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('events.show', trans('backend.cancel'), array($event->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success btn-block', 'style' => 'white-space: normal;']) }}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
</div> <!-- end of .row (form) -->
@stop

@section('scripts')
  <script src="/js/jquery.slugify.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf-8">
    $().ready(function () {
      $('.slug').slugify('#title');
    }); 
  </script>
  <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
  <script src="/tinymce/js/tinymce/tinymce.min.js"></script>
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
