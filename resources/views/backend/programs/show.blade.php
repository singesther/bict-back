@extends('backend.layouts.admin')

@section('title', '| View Program')

@section('content')
<div class="row modify-row-margin">
    <div class="col-md-8">
      <h1>{{ $program->title }}</h1>
      <p class="lead">{!! $program->description !!}</p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal form-spacing-top">
          <label>Thumbnail / Featured Image</label>
          @if($program->file_name != '')
          <img class="program-img" id="uploadedimage" src="{{ asset('images/programs/' . $program->file_name) }}" width="100%" height= "100%">
          @else
          <img class="program-img" id="uploadedimage" src="{{ asset('images/banner-hero.png') }}" width="100%" height= "100%">
          @endif
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($program->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($program->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('programs.edit', trans('backend.edit'), array($program->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['programs.destroy', $program->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('programs.index','All programs', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('programs.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
         
        </div>
      </div>
    </div>
</div>
@endsection
