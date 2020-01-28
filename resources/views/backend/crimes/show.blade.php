@extends('backend.layouts.admin')

@section('title', '| View Crime Reported')

@section('stylesheet')
<style type="text/css">
  .crime-image {
    width: 480px;
    height: 360px;
  }
</style>
@endsection

@section('content')
<div class="main-content">
  <div class="container-fluid">
<div class="row">
    <div class="col-md-8">
      <h1>{{ $crime->title }}</h1>

      <p class="lead">{!! $crime->description !!}</p>
      <img class="crime-image form-spacing-top" id="uploadedfile" src="{{ asset('images/crimes/' . $crime->file_name) }}" width="480px" height= "360px">
    </div>

    <div class="col-md-4">
      <div class="well hidden">
        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($crime->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($crime->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('crimes.edit', trans('backend.edit'), array($crime->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['crimes.destroy', $crime->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('crimes.index', 'All crimes', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('crimes.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div> 
        </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
@endsection
