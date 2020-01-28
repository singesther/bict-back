@extends('backend.layouts.admin')

@section('title', '| View Activity')

@section('stylesheet')
<style type="text/css">
  .activity-image {
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
      <h1>{{ $activity->title }}</h1>
      <p><b>Location</b>: {{$activity->district}}</p> 
      <p><b>Date</b>: {{$activity->date}}</p> 

      <p class="lead">{!! $activity->description !!}</p>
      @if($activity->file_name != '')
        <img class="activity-image form-spacing-top" id="uploadedfile" src="{{ asset('images/activities/' . $activity->file_name) }}" width="480px" height= "360px">
      @else
        <img class="activity-image form-spacing-top" id="uploadedfile" src="{{ asset('images/banner-hero.png') }}" width="100%" height= "100%">
      @endif
      
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('activities.single', $activity->slug) }}">{{ route('activities.single', $activity->slug) }}</a></p>
        </dl>

        <dl class="dl-horizontal">
          <label>@lang('backend.created_at'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($activity->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>@lang('backend.last_updated'):</label>
          <p>{{ date('M j, Y h:ia', strtotime($activity->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          @role('district-coordinator')
            @if($activity->user->id == Auth::user()->id)
              <div class="col-md-6">
                {{ Html::linkRoute('activities.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
              </div> 
              <div class="col-sm-6">
                <button class="btn btn-danger btn-block btn-delete delete-modal" data-id="{{$activity->id}}" data-title="{{$activity->title}}" value="{{$activity->id}}"><span class="fa fa-trash-o"></span>&nbsp;Delete
                 </button>
              </div>
            @endif
          @endrole
        </div>
        <div class="row">
          @role('district-coordinator')
            @if($activity->user->id == Auth::user()->id)
              <div class="col-sm-6">
                {!! Html::linkRoute('activities.edit', trans('backend.edit'), array($activity->id), array('class' => 'btn btn-primary btn-block  btn-h1-spacing')) !!}
              </div>
              <div class="col-md-6">
                {{ Html::linkRoute('district.activities', 'All activities', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
              </div>
            @endif
          @endrole
        </div>
      </div>
    </div>
</div>
</div>
</div>
    @include('backend.activities.delete')
@endsection


@section('scripts')
<script type="text/javascript">
  //delete a activity
  $(document).on('click', '.delete-modal', function() {
      $('.modal-title').text('Delete activity');
      $('.dname').html($(this).data('title'));
      var activity_id = $(this).val();
      $('#deltbtn').val(activity_id);
      $('#deleteModal').modal('show');
      console.log($(this).data('id'));
      console.log($(this).data('title'));

  });
</script>
@endsection
