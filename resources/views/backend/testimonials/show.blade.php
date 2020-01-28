@extends('backend.layouts.admin')

@section('title', '| Testimonial')

@section('stylesheets')
<style type="text/css">
  .creature-picture {
    width: 200px;
    height: 200px;
    border: 5px solid #fff;
    border-radius: 50%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-8 col-sm-8">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <img class="creature-picture" src="{{ asset('images/testimonials/'. $testimonial->file_name)}}">
            <h4 class="pull-right">{{$testimonial->description}} ~ {{$testimonial->creator_name}}</h4>
            <h4>{{$testimonial->creator_position}} - {{$testimonial->creator_company}}</h4>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        {!! Html::linkRoute('testimonials.edit', 'Edit', array($testimonial->id), array('class' => 'btn btn-primary btn-block btn-spacing')) !!}
     
        {{ Html::linkRoute('testimonials.index', 'All Testimonials', array(), ['class' => 'btn btn-info btn-block btn-spacing']) }}
     
        {{ Html::linkRoute('testimonials.create', 'Add New Testimonial', array(), ['class' => 'btn btn-success btn-block btn-spacing']) }}
      
        {!! Form::open(['route' => ['testimonials.destroy', $testimonial->id], 'method'=>'DELETE', 'class' => 'btn-spacing']) !!}

        {!! Form::submit('Delete this testimonial', ['class' => 'btn btn-danger btn-block btn-spacing']) !!}

        {!! Form::close() !!}
      </div>
    </div>

@endsection
