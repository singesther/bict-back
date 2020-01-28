@extends('backend.layouts.admin')

@section('title', '| Video')

@section('stylesheets')
<style type="text/css">
<style>
@media(max-width:640px) {
  .your-centered-div {
      margin: 10px;
     
  }
   .your-centered-div iframe{
       width:100%
  }
}
</style>
</style>
@endsection

@section('content')
<div class="row modify-row-margin form-spacing-bottom">
  <div class="col-sm-8">
    <h3>{{$video->title}}</h3>
    <div class="your-centered-div">{!! $video->video_code !!}</div>
  </div>

  <div class="col-sm-4 form-spacing-top">
    <p>{{$video->description}}</p>

    {!! Html::linkRoute('videos.edit', 'Edit', array($video->id), array('class' => 'btn btn-primary btn-h1-spacing')) !!}
  @role('administrator')
    {!! Form::open(['route' => ['videos.destroy', $video->id], 'method'=>'DELETE']) !!}

    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-h1-spacing']) !!}

    {!! Form::close() !!}
  @endrole
    {{ Html::linkRoute('videos.index', 'All videos', array(), ['class' => 'btn btn-info btn-h1-spacing']) }}
    {{ Html::linkRoute('videos.create', 'Add New video', array(), ['class' => 'btn btn-success btn-h1-spacing']) }}
 
    {!! Form::open(['route' => ['videos.destroy', $video->id], 'method'=>'DELETE']) !!}

    {!! Form::submit('Delete', ['class' => 'btn btn-danger form-spacing-top']) !!}

    {!! Form::close() !!}
  </div>
</div>
@endsection
