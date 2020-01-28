@extends('backend.layouts.admin')

@section('title', '| View About')

@section('content')
<div class="row modify-row-margin">
    <div class="col-md-8">
      <h1>{{ $about->title }}</h1>

      <p class="lead">{!! $about->content !!}</p>

      <div>{!! $about->youtube_video !!}</div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('abouts.single', $about->slug) }}">{{ route('abouts.single', $about->slug) }}</a></p>
        </dl>

        <dl class="dl-horizontal form-spacing-top">
          <label>Thumbnail / Featured Image</label>
          @if($about->file_name != '')
          <img class="about-img form-spacing-top" id="uploadedimage" src="{{ asset('images/abouts/' . $about->file_name) }}" width="100%" height= "100%">
          @else
          <img class="about-img form-spacing-top" id="uploadedimage" src="{{ asset('images/banner-hero.png') }}" width="100%" height= "100%">
          @endif
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($about->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($about->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('abouts.edit', trans('backend.edit'), array($about->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('abouts.index', trans('backend.abouts'), array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('abouts.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
         
        </div>
      </div>
    </div>
</div>
@endsection
