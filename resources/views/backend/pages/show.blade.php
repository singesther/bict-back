@extends('backend.layouts.admin')

@section('title', '| View Page')

@section('content')
<div class="main-content">
  <div class="container-fluid">
<div class="row">
    <div class="col-md-8">
      <h1>{{ $page->title }}</h1>

      <p class="lead">{!! $page->body !!}</p>

    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('pages.single', $page->slug) }}">{{ route('pages.single', $page->slug) }}</a></p>
        </dl>

        <dl class="dl-horizontal">
          <label>Create At:</label>
          <p>{{ date('M j, Y h:ia', strtotime($page->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($page->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['pages.destroy', $page->id], 'method'=>'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('pages.index', 'All pages', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('pages.create', 'Write New Page', array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
         
        </div>
      </div>
    </div>
</div>
</div>
</div>
@endsection
