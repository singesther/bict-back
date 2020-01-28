@extends('backend.layouts.admin')

@section('title', '| Events')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .event-image {
    width: 32px;
    height: 32px;
  }



/*  .table tr td .fa{
      color: #717F86;
  }*/

</style>
@endsection

@section('content')
    <div class="row modify-row-margin form-spacing-bottom">
      <div class="dashboard-float1">
        <h3>Events</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('events.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i> @lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center">
      <div class="col-md-4 col-md-offset-2">
        <h4>@lang('backend.published')({{ $approvedevents }})</h4>
      </div>
      <div class="col-md-4">
        <h4>@lang('backend.none_published')({{ $notapprovedevents }})</h4>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>


    <div class="row modify-row-margin">
      <div class="col-md-12 table-responsive">  
        <table class="table" id="table">
          <thead>
              <th>No</th>
              <th>@lang('backend.title')</th>
              <th>Description</th>
              <th>@lang('backend.publish')</th>
              <th>@lang('backend.created_at')</th>
              <th>Actions</th>
          </thead>

          <tbody id="events-list" name="events-list">
            <?php $no=1; ?>
            @foreach ($events as $event)
              <tr id="event{{$event->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ substr(strip_tags($event->title), 0, 50) }} </td>
                <td>{{ substr(strip_tags($event->description), 0, 50) }} </td>

                @if($event->live == 0)
                    <td class="event-approved"><button class="btn btn-default" data-id="{{$event->id}}">No</button></td>
                @else
                    <td class="event-approved"><button class="btn btn-success" data-id="{{$event->id}}">Yes</button></td>
                @endif

                <td>{{ date('M j, Y', strtotime($event->created_at)) }}</td>

                <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('events.show', $event->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') event
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('events.edit', $event->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') event
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$event->id}}" data-title="{{$event->title}}" value="{{$event->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') event
                              </button>
                          </li>
                      </ul>
                  </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
      @foreach ($events as $event)
          @include('backend.events.delete')
      @endforeach
@stop


@section('scripts')
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>

<script type="text/javascript">
$('.event-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var event_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/events/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'eventId': event_id,
              'eventApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('Event content are published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('Event content are not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a event
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete event');
    $('.dname').html($(this).data('title'));
    var event_id = $(this).val();
    $('#deltbtn').val(event_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-event', function() {
    var event_id = $('#deltbtn').val();
    console.log(event_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/events/' + event_id,
        success: function(data) {
            console.log(data);
            $("#event" + event_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
            alert(data);
        }
    });
});

</script>
@endsection
