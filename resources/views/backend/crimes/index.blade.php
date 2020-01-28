@extends('backend.layouts.admin')

@section('title', '| All Crimes Reported')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">

  .crime-image {
    width: 32px;
    height: 32px;
  }

</style>
@endsection

@section('content')
  	<div class="row modify-row-margin form-spacing-bottom form-spacing">
  		<div class="col-md-10 col-sm-9 col-xs-9">
  			<h2>All crimes</h2>
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
    					<th>Subject</th>
    					<th>Description</th>
              <th>Approved</th>
    					<th>@lang('backend.created_at')</th>
    					<th>Actions</th>
  				</thead>

  				<tbody id="crimes-list" name="crimes-list">
          <?php $no=1; ?>
  					@foreach ($crimes as $crime)
              <tr id="crime{{$crime->id}}">
                <td>{{ $no++ }}</td>
                <td><img class="crime-image" src="{{ asset('images/crimes/'. $crime->file_name)}}"></td>
  							<td>{{ substr(strip_tags($crime->subject), 0, 50) }}</td>
  							<td>{{ substr(strip_tags($crime->description), 0, 20) }}{{ strlen(strip_tags($crime->description)) > 20 ? "..." : "" }}</td>
                @if($crime->live == 0)
                  <td class="crime-approved"><button class="btn btn-default" data-id="{{$crime->id}}">No</button></td>
                @else
                  <td class="crime-approved"><button class="btn btn-success" data-id="{{$crime->id}}">Yes</button></td>
                @endif
                <td>{{ date('M j, Y', strtotime($crime->created_at)) }}</td>
  							 <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('crimes.show', $crime->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') crime
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('crimes.edit', $crime->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') crime
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$crime->id}}" data-title="{{$crime->subject}}" value="{{$crime->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') crime
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
  @foreach ($crimes as $crime)
      @include('backend.crimes.delete')
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
$('.crime-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var crime_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/crimes/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'crimeId': crime_id,
              'crimeApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('The crime is approved', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The crime is not approved', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a crime
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete crime');
    $('.dname').html($(this).data('title'));
    var crime_id = $(this).val();
    $('#deltbtn').val(crime_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-crime', function() {
    var crime_id = $('#deltbtn').val();
    console.log(crime_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/crimes/' + crime_id,
        success: function(data) {
            console.log(data);
            $("#crime" + crime_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
