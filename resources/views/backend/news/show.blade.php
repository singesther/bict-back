@extends('backend.layouts.admin')

@section('title', '| View Post')

@section('content')
<div class="row modify-row-margin">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>

      <p class="lead">{!! $post->content !!}</p>

      <div class="tags">
        @foreach ($post->tags as $tag)
          <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
      </div>

      <div id="backend-comments" style="margin-top: 50px;">
        <h3>@lang('backend.comments') <small>{{ $post->comments()->count() }} total</small></h3>

        <table class="table">
          <thead>
            <tr>
              <th>@lang('auth.name')</th>
              <th>Email</th>
              <th>@lang('backend.comments')</th>
              <th width="70px"></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($post->comments as $comment)
            <tr>
              <td>{{ $comment->name }}</td>
              <td>{{ $comment->email }}</td>
              <td>{!! $comment->comment !!}</td>
              <td>
                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                @role('admin')
                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                @endrole
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('news.single', $post->slug) }}">{{ route('news.single', $post->slug) }}</a></p>
        </dl>
        <dl class="dl-horizontal form-spacing-top">
          <label>Thumbnail / Featured Image</label>
          <img class="post-img" id="uploadedimage" src="{{ asset('images/news/' . $post->thumbnail) }}" width="100%" height= "100%">
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('news.edit', trans('backend.edit'), array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['news.destroy', $post->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkRoute('news.index', trans('backend.all_posts'), array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
          <div class="col-md-6">
            {{ Html::linkRoute('news.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
         
        </div>
      </div>
    </div>
</div>
@endsection
