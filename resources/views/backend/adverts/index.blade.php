@extends('backend.layouts.admin')

@section('title', '| Adverts')

@section('stylesheet')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  td img{
    width: 32px;
    height: 32px;
  }
</style>
@endsection

@section('content')
<div class="row modify-row-margin">
  <div class="dashboard-float1">
    <h3>All Adverts</h3>
  </div>

  <div class="dashboard-float2">
    <a href="{{ route('adverts.create') }}" class="btn btn-primary btn-h1-spacing"><span class="fa fa-plus-circle"> New advert</span></a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!-- end of .row -->
  <div class="row modify-row-margin">
    <div class="col-md-12 table-responsive">
      <table class="table" id="table">
        <thead>
          <th>#</th>
          <th>Image</th>
          <th>Description</th>
          <th>Url</th>
          <th>Publish</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th>Action</th>
        </thead>

        <tbody id="adverts-list" name="adverts-list">

          @foreach ($adverts as $advert)
            <tr id="advert{{$advert->id}}">
              <td>{{ $advert->id }}</td>
              <td><img class="advert-image" src="{{ asset('images/adverts/'. $advert->advert_image)}}"></td>
              <td>{{ substr(strip_tags($advert->description), 0, 50) }}</td>
              <td>{{ substr(strip_tags($advert->url), 0, 20) }}{{ strlen(strip_tags($advert->url)) > 20 ? "..." : "" }}</td>
   
              @if($advert->live == 0)
                  <td class="advert-live"><button class="btn btn-default" data-id="{{$advert->id}}">No</button></td>
              @else
                  <td class="advert-live"><button class="btn btn-success" data-id="{{$advert->id}}">Yes</button></td>
              @endif

              <td>{{ date('M j, Y', strtotime($advert->created_at)) }}</td>
              <td>{{ date('M j, Y', strtotime($advert->updated_at)) }}</td>
              <td>
                <a href="{{ route('adverts.show', $advert->id) }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>
                <a href="{{ route('adverts.edit', $advert->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$advert->id}}" data-title="{{$advert->title}}" value="{{$advert->id}}"><span class="fa fa-trash-o"></span>
                </button>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

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
              Do you really want to delete: <span class="dname"></span> ?
            </div>
                    <div class="modal-footer">
                        <button type="button" id="deltbtn" value="" class="btn btn-danger delete-advert" data-dismiss="modal">
                            <span class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
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
$('.advert-live .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var advert_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var liveNumb = 1;
    }else{
        var liveNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/adverts/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'advertId': advert_id,
              'advertApproved': liveNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('Advert is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('Advert is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a advert
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete advert');
    $('.dname').html($(this).data('title'));
    var advert_id = $(this).val();
    $('#deltbtn').val(advert_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));
});

$(document).on('click', '.delete-advert', function() {
    var advert_id = $('#deltbtn').val();
    console.log(advert_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/adverts/' + advert_id,
        success: function(data) {
            console.log(data);
            $("#advert" + advert_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection




