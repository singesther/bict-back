@extends('backend.layouts.admin')

@section('title', '| Picture')

@section('stylesheets')
<style type="text/css">
  .galley-picture {
    width: 480px;
    height: 360px;
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-6 col-sm-6">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <img class="galley-picture" src="{{ asset('images/gallery/'. $gallery->file_name)}}">
            <h4>{{$gallery->title}}</h4>
            <h4>{{$gallery->description}}</h4>

            <h4>{{$gallery->url}}</h4>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        {!! Html::linkRoute('gallery.edit', 'Edit', array($gallery->id), array('class' => 'btn btn-primary btn-block btn-spacing')) !!}
     
        {{ Html::linkRoute('gallery.index', 'All gallery', array(), ['class' => 'btn btn-info btn-block btn-spacing']) }}
     
        {{ Html::linkRoute('gallery.create', 'Add New picture', array(), ['class' => 'btn btn-success btn-block btn-spacing']) }}
      
        {!! Form::open(['route' => ['gallery.destroy', $gallery->id], 'method'=>'DELETE', 'class' => 'btn-spacing']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-spacing']) !!}

        {!! Form::close() !!}
      </div>
    </div>

@endsection
