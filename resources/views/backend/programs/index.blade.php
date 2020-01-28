@extends('backend.layouts.admin')

@section('title', '| Programs')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .program-image {
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
        <h3>Programs</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('programs.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i> @lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->


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

          <tbody id="programs-list" name="programs-list">
            <?php $no=1; ?>
            @foreach ($programs as $program)
              <tr id="program{{$program->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ substr(strip_tags($program->title), 0, 50) }} </td>
                <td>{{ substr(strip_tags($program->description), 0, 50) }} </td>

                @if($program->live == 0)
                    <td class="program-approved"><button class="btn btn-default" data-id="{{$program->id}}">No</button></td>
                @else
                    <td class="program-approved"><button class="btn btn-success" data-id="{{$program->id}}">Yes</button></td>
                @endif

                <td>{{ date('M j, Y', strtotime($program->created_at)) }}</td>

                <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('programs.show', $program->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') program
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('programs.edit', $program->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') program
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$program->id}}" data-title="{{$program->title}}" value="{{$program->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') program
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
      @foreach ($programs as $program)
          @include('backend.programs.delete')
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
$('.program-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var program_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/programs/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'programId': program_id,
              'programApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('Program content are published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('Program content are not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a program
$(document).on('click', '.delete-modal', function() {
  $('.modal-title').text('Delete program');
  $('.dname').html($(this).data('title'));
  var program_id = $(this).val();
  $('#deltbtn').val(program_id);
  $('#deleteModal').modal('show');
  console.log($(this).data('id'));
  console.log($(this).data('title'));
});

$(document).on('click', '.delete-program', function() {
  var program_id = $('#deltbtn').val();
  console.log(program_id);

  $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  })
  $.ajax({
      type: 'DELETE',
      url: '/dashboard/programs/' + program_id,
      success: function(data) {
          console.log(data);
          $("#program" + program_id).remove();
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
