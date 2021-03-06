@extends('backend.layouts.admin')

@section('title', '| View Program')

@section('content')
<div class="row modify-row-margin">
    <div class="col-md-8">
      <h1>{{ $event->title }}</h1>
      <p><b>Location</b>: {{$event->location}}</p> 
      <p><b>Date</b>: {{$event->date}}</p> 
      <p><b>Hosted by</b>: {{$event->hosted_by}}</p> 
      <p class="lead">{!! $event->description !!}</p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal form-spacing-top">
          <label>Thumbnail / Featured Image</label>
          <img class="event-img" id="uploadedimage" src="{{ asset('images/events/' . $event->file_name) }}" width="100%" height= "100%">
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($event->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($event->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('events.edit', trans('backend.edit'), array($event->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['events.destroy', $event->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('events.index','All events', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('events.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
         
        </div>
      </div>
    </div>
</div>
@endsection
