@extends('backend.layouts.admin')

@section('title', '| Activities')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .activity-image {
    width: 32px;
    height: 32px;
  }

  .dropdown-menu {
    min-width: 100px;
  }

  .dropdown-menu li button, .dropdown-menu li a{
    width:100%;
    color: #ffffff;
    text-align: left;
  }
  .btn-group .dropdown-menu .divider {
      background-color: #ffffff;
  }
  .btn-group .dropdown-menu{
      padding: 0px 0;
      left: -50px;
      border-color: rgba(0, 0, 0, 0.3);
      box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
  .btn-group .dropdown-menu li{
      padding: 3px;
  }

  .btn-info{
      background-color: #5094b9;
      border-color: #5094b9;
      color: #ffffff;
  }

/*  .table tr td .fa{
      color: #717F86;
  }*/

</style>
@endsection

@section('content')
    <div class="row modify-row-margin form-spacing-bottom">
      <div class="dashboard-float1">
        <h2>All districts activities </h2>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center">
      <div class="col-md-4 col-md-offset-2">
        <h4>@lang('backend.published')({{ $approvedactivities }})</h4>
      </div>
      <div class="col-md-4">
        <h4>@lang('backend.none_published')({{ $notapprovedactivities }})</h4>
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
              <th>@lang('backend.picture')</th>
              <th>@lang('backend.title')</th>
              <th>District</th>
              <th>Program</th>
              <th>Description</th>
              @role('superadmin|admin|secretary')<th>@lang('backend.publish')</th>@endrole
              <th>@lang('backend.created_at')</th>
              <th>Actions</th>
          </thead>

          <tbody id="activities-list" name="activities-list">
            <?php $no=1; ?>
            @foreach ($activities as $activity)
              <tr id="activity{{$activity->id}}">
                <td>{{ $no++ }}</td>
                <th><img class="activity-image" src="{{ asset('images/activities/'. $activity->file_name)}}"></th>
                <td>{{ substr(strip_tags($activity->title), 0, 50) }} </td>
                <td>{{ $activity->user->district }}</td>
                <td>{{ $activity->program->title }}</td>
                <td>{{ substr(strip_tags($activity->description), 0, 50) }} </td>
                @role('superadmin|admin|secretary')
                  @if($activity->live == 0)
                      <td class="activity-approved"><button class="btn btn-default" data-id="{{$activity->id}}">No</button></td>
                  @else
                      <td class="activity-approved"><button class="btn btn-success" data-id="{{$activity->id}}">Yes</button></td>
                  @endif
                @endrole

                <td>{{ date('M j, Y', strtotime($activity->created_at)) }}</td>

                <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('activities.show', $activity->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') activity
                              </button>
                          </li>
                          @role('district-coordinator')
                            @if($activity->user->id == Auth::user()->id)
                            <li>
                                <button onclick="location.href ='{{ route('activities.edit', $activity->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                   &nbsp;@lang('backend.edit') activity
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$activity->id}}" data-title="{{$activity->title}}" value="{{$activity->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') activity
                                </button>
                            </li>
                            @endif
                          @endrole
                      </ul>
                  </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
      @foreach ($activities as $activity)
          @include('backend.activities.delete')
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
$('.activity-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var activity_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/activities/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'activityId': activity_id,
              'activityApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('activity content are published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('activity content are not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

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

$(document).on('click', '.delete-activity', function() {
    var activity_id = $('#deltbtn').val();
    console.log(activity_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/activities/' + activity_id,
        success: function(data) {
            console.log(data);
            $("#activity" + activity_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }
    });
});

</script>
@endsection
