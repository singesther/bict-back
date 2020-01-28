@extends('backend.layouts.admin')

@section('title', '| All Activities')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .activity-image {
    width: 32px;
    height: 32px;
  }
</style>
@endsection

@section('content')
  	<div class="row modify-row-margin form-spacing-bottom form-spacing">
  		<div class="col-md-10 col-sm-9 col-xs-9">
         <?php  $user = App\User::where('id', Auth::user()->id)->first(); ?>
  			<h2>All activities </h2><h4>in {{ $user->district}} District</h4>
  		</div>
  		<div class="col-md-2"  style="margin-left: 0em;">
  			<a href="{{ route('activities.create') }}" class="btn btn-primary btn-h1-spacing">
          <span class="fa fa-plus-circle"> @lang('backend.add_new')</a>
  		</div>
      <div class="col-md-4 col-md-offset-2 text-center">
  			<h4>@lang('backend.published') ({{ $approvedactivities }})</h4>
  		</div>
      <div class="col-md-4">
  			<h4>@lang('backend.none_published') ({{ $notapprovedactivities }})</h4>
  		</div>
    </div>
		<div class="col-md-12">
			<hr>
		</div>


  	<div class="row modify-row-margin form-spacing-bottom form-spacing">
  		<div class="col-md-12">
  			<table class="table" id="table">
  				<thead>
    					<th>#</th>
              <th>@lang('backend.picture')</th>
    					<th>@lang('backend.title')</th>
              <th>Program</th>
    					<th>Description</th>
              <th>Status</th>
    					<th>@lang('backend.created_at')</th>
    					<th>Actions</th>
  				</thead>

  				<tdescription>

  					@foreach ($activities as $activity)

  						<tr>
  							<td>{{ $activity->id }}</td>
                <th><img class="activity-image" src="{{ asset('images/activities/'. $activity->file_name)}}"></th>
  							<td>{{ substr(strip_tags($activity->title), 0, 50) }}</td>
                <td>{{ $activity->program->title }}</td>
  							<td>{{ substr(strip_tags($activity->description), 0, 20) }}{{ strlen(strip_tags($activity->description)) > 20 ? "..." : "" }}</td>
                @if($activity->live == 0)
                  <td><label class="label label-default">Not approved</label></td>
                @else
                  <td><label class="label label-success">Approved</label></td>
                @endif
                <td>{{ date('M j, Y', strtotime($activity->created_at)) }}</td>
  							<td>
  								<a href="{{ route('activities.show', $activity->id) }}" class="btn btn-success btn-sm" title="View"><span class="fa fa-eye"></span></a>
  								<a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-primary btn-sm" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>

                  @role('admin|secretary')
                  <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$activity->id}}" data-title="{{$activity->title}}" value="{{$activity->id}}"><span class="fa fa-trash-o"></span>
                  </button>
                  @endrole
  							</td>
  						</tr>

  					@endforeach

  				</tdescription>
  			</table>

  		</div>
  	</div>
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
              toastr.success('The activity is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The activity is not published', 'Warning Alert', { timeOut: 2000 });
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
        }
    });
});
</script>
@endsection
