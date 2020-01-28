@extends('backend.layouts.admin')

@section('title', '| Subscribers')

@section('stylesheet')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="dashboard-float1">
        <h3>Subscribers</h3>
      </div>
    </div>

    <div class="row modify-row-margin">
      <div class="col-md-8">
        <div class="table-responsive">
          <table class="table" id="table">
          <thead>
            <tr>
              <th>id</th>
              <th>Email</th>
              <th>Date Subscribed</th>
              <th>Subscribe</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="subscribers-list" name="subscribers-list">
            @foreach ($maillist as $subscriber)
              <tr id="subscriber{{$subscriber->id}}">
                <th>{{$subscriber->id}}</th>
                <td>{{$subscriber->email}}</td>
                <td>{{$subscriber->created_at->toFormattedDateString()}}</td>

                @if($subscriber->subscribed == 0)
                  <td class="subscriber-subscribed"><button class="btn " data-id="{{$subscriber->id}}">No</button></td>
                @else
                  <td class="subscriber-subscribed"><button class="btn btn-success" data-id="{{$subscriber->id}}">Yes</button></td>
                @endif

                <td>
             <!--       <a href="{{ route('maillist.show', $subscriber->id) }}" class="btn btn-info" v-bind:title="messageshow"><span class="fa fa-eye"></span></a> -->
                   <button class="btn btn-danger btn-delete delete-modal" v-bind:title="messagedelete" data-id="{{$subscriber->id}}" data-email="{{$subscriber->email}}" value="{{$subscriber->id}}"><span class="fa fa-trash-o"></span></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div> <!-- end of .card -->

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
                        <button type="button" id="deltbtn" value="" class="btn btn-danger delete-subscriber" data-dismiss="modal">
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
@endsection

@section('scripts')
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>

<script type="text/javascript">
$('.subscriber-subscribed .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var subscriber_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var subscribedNumb = 1;
    }else{
        var subscribedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/maillist/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'subscriberId': subscriber_id,
              'subscriberApproved': subscribedNumb
        },
        success: function(data) {
            // empty
            if(data.subscribed == "1"){
              toastr.success('The person is subscribed', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The person is not subscribed', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});


//delete a subscriber
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete subscriber');
    $('.dname').html($(this).data('email'));
    var subscriber_id = $(this).val();
    $('#deltbtn').val(subscriber_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-subscriber', function() {
    var subscriber_id = $('#deltbtn').val();
    console.log(subscriber_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/maillist/' + subscriber_id,
        success: function(data) {
            console.log(data);
            $("#subscriber" + subscriber_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection

