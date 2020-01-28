@extends('backend.layouts.admin')

@section('title', '| Team Members')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .team-img {
    margin-right: 2px;
    width: 22px;
    height: 22px;
  }
</style>
@endsection

@section('content')
<div class="row modify-row-margin">
  <div class="col-md-9">
    <h3>Our Team</h3>
  </div>

  <div class="col-md-3 pull-right form-spacing">
    <a href="{{ route('team.create') }}" class="btn btn-primary"><span class="fa fa-plus-circle"> Add New </a>
  </div>

</div> <!-- end of .row -->
  <div class="row modify-row-margin">
    <div class="col-md-12 table-responsive">
      <table class="table table-hover" id="table">
        <thead>
          <th>#</th>
          <th>Pic</th>
          <th>Name</th>
          <th>Position</th>
          <th>Group</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th>@lang('backend.publish')</th>
          <th style="width: 200px;">Action</th>
        </thead>

        <tbody>
          <?php $no=1; ?>
          @foreach ($team as $team)
            <tr id="team{{$team->id}}" class="active">
              <th>{{ $no++ }}</th>
              <th><img src="{{ asset('images/team/'. $team->image) }}" class="img-circle team-img"></th>
              <th>{{ $team->name }}</th>
              <th>{{ $team->position }}</th>
              <td>{{ $team->group }}</td>
              <td>{{ date('M j, Y', strtotime($team->created_at)) }}</td>
              <td>{{ date('M j, Y', strtotime($team->updated_at)) }}</td>
              @if($team->is_published == 0)
                  <td class="team-approved"><button class="btn btn-default" data-id="{{$team->id}}">No</button></td>
              @else
                  <td class="team-approved"><button class="btn btn-success" data-id="{{$team->id}}">Yes</button></td>
              @endif
              <td>
                <div class="btn-group">
                  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="fa fa-ellipsis-v"></span> </a>
                  <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                            <button onclick="location.href ='{{ route('team.show', $team->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') @lang('backend.member')
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('team.edit', $team->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') @lang('backend.member')
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$team->id}}" data-name="{{$team->name}}" value="{{$team->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') @lang('backend.member')
                              </button>
                          </li>
                 </ul>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>

      <!-- DELETE MODAL SECTION -->
      <div id="deleteModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                      <div class="deleteContent">
                @lang('backend.delete_message'): <span class="dname"></span> ?
              </div>
                      <div class="modal-footer">
                          <button type="button" id="deltbtn" value="" class="btn btn-danger delete-team" data-dismiss="modal">
                              <span class='glyphicon glyphicon-trash'></span> @lang('backend.delete')
                          </button>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">
                              <span class='glyphicon glyphicon-remove'></span> @lang('backend.close')
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
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
$('.team-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var team_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/team/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'teamId': team_id,
              'teamApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('That person is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('That person is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a team
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete team');
    $('.dname').html($(this).data('name'));
    var team_id = $(this).val();
    $('#deltbtn').val(team_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('name'));

});

$(document).on('click', '.delete-team', function() {
    var team_id = $('#deltbtn').val();
    console.log(team_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/team/' + team_id,
        success: function(data) {
            console.log(data);
            $("#team" + team_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});

</script>
@endsection