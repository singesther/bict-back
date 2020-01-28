@extends('backend.layouts.admin')

@section('title', '| Edit Post')

@section('stylesheets')
  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
  <style type="text/css">
  .post-img {
    width: 250px;
    height: 200px;
  }
  .form-spacing{
    margin: 30px;
  }
</style>
@endsection


@section('content')
<div class="row modify-row-margin">
  <div class="col-md-12">
    <h3>@lang('backend.edit') - @lang('backend.post')</h3>
  <hr>
  </div>
</div>
<div class="row modify-row-margin">
  {!! Form::model($post, ['route' => ['news.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="col-md-9">
      {{ Form::label('title', 'Title', ['class' => '']) }}
      {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}

      {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
      {{ Form::text('slug', null, ['class' => 'slug form-control', 'readonly' => '', 'id' => 'slug_input']) }}

      {{ Form::label('content', trans('backend.content'), ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('content', null, ['class' => 'form-control my-editor']) }}
    </div>
    <div class="col-md-3">
          {{ Form::label('category_id', trans('backend.category'), ['class' => 'form-spacing']) }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

          {{ Form::label('tags', trans('backend.tags'), ['class' => 'form-spacing-top']) }}
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

          {{ Form::label('approval', trans('backend.publish'), ['class' => 'form-spacing-top']) }}
          {{ Form::checkbox('approval', 1, true) }}
          <br/>
          
          {{ Form::label('thumbnail', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
          {{ Form::file('thumbnail', ['id' => 'jimage']) }}
          <img class="post-img form-spacing-top" id="uploadedimage" src="{{ asset('images/news/' . $post->thumbnail) }}">
          <p>
              <span id="imageerror" style="font-weight: bold; color: red"></span>
          </p>
        </div>
       
        
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('news.show', trans('backend.cancel'), array($post->id), array('class' => 'btn btn-danger form-spacing')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success form-spacing', 'style' => 'white-space: normal;']) }}
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

  <!-- Preview of image uploaded -->
	<script>
				 $(document).ready(function() {
						 document.getElementById("jimage").onchange = function () {
								 var reader = new FileReader();

								 reader.onload = function (e) {
										 if (e.total > 25000000) {
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
