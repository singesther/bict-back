@extends('backend.layouts.admin')

@section('title', '| Videos')

@section('stylesheets')
<style type="text/css">
  .video-image {
    width: 20%;
  }
  .video-image iframe{
    width: 100px;
    height: 50px
  }
</style>
@endsection

@section('content')
<div class="row modify-row-margin">
  <div class="col-md-10">
    <h3>@lang('backend.all_videos')</h3>
  </div>

  <div class="col-md-2">
    <a href="{{ route('videos.create') }}" class="btn btn-primary btn-h1-spacing"><span class="fa fa-plus-circle"> @lang('backend.add_new')</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!-- end of .row -->
  <div class="row modify-row-margin">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Video</th>
          <th>@lang('backend.content')</th>
          <th>@lang('backend.published')</th>
          <th>@lang('backend.created_at')</th>
          <th>Actions</th>
        </thead>

        <tbody>

          @foreach ($videos as $video)
            <tr>
              <th>{{ $video->id }}</th>
              <th class="video-image">{!! $video->video_code !!}</th>
              <td>{{ substr(strip_tags($video->title), 0, 25) }}</p></td>
              @if($video->is_published == 0)
                <td class="video-approved"><button class="btn btn-default" data-id="{{$video->id}}">No</button></td>
              @else
                <td class="video-approved"><button class="btn btn-success" data-id="{{$video->id}}">Yes</button></td>
              @endif
              <td>{{ date('M j, Y', strtotime($video->created_at)) }}</td>
              <td>
                <a href="{{ route('videos.show', $video->id) }}" class="btn btn-success btn-sm">View</a>
                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-primary btn-sm">Edit</a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@stop

@section('scripts')
<script src="/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$('.video-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var video_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/videos/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'videoId': video_id,
              'videoApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('The video is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The video is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a video
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete video');
    $('.dname').html($(this).data('title'));
    var video_id = $(this).val();
    $('#deltbtn').val(video_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-video', function() {
    var video_id = $('#deltbtn').val();
    console.log(video_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/videos/' + video_id,
        success: function(data) {
            console.log(data);
            $("#video" + video_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
