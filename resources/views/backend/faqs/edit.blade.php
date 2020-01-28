@extends('backend.layouts.admin')

@section('title', '| Edit FAQ')

@section('stylesheets')
<style type="text/css">

</style>
@endsection


@section('content')
 <div class="row modify-row-margin">
  <div class="dashboard-float1">
     <h3>Update FAQ</h3>
  </div>
</div> <!-- end of .row -->
<div class="row modify-row-margin">
  <!-- EDIT MODAL SECTION -->
    {!! Form::model($faq, ['route' => ['faqs.update', $faq->id], 'method' => 'PUT', 'files' => true]) !!}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group">
          <label for="inputQuestion" class="control-label">Question</label>
          {{ Form::text('question', null, ['class' => 'form-control', 'id' => 'title']) }}
        </div>
        <div class="form-group">
          <label for="inputAnswer" class="control-label" for="answer">Answer</label>
          {{ Form::textarea('answer', null, ['class' => 'form-control my-editor']) }}
        </div>
         {{ Form::submit(trans('backend.save_changes'), ['class' => 'btn btn-success pull-right form-spacing', 'style' => 'white-space: normal;']) }}
      </div>
    </div>
   
 {!! Form::close() !!}
</div>
@endsection

@section('scripts')
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
@endsection
