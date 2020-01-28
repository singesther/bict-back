@extends('backend.layouts.admin')

@section('title', '| Contact us - messages')

@section('stylesheet')
<style type="text/css">
  .img-circle {
    margin-right: 2px;
    width: 22px;
    height: 22px;
  }
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <h3>Contact us - Messages</h3>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!-- end of .row -->
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Created_at</th>
          <th style="width: 200px;">Operations</th>
        </thead>

        <tbody>
          <?php $no=1; ?>
          @foreach ($contacts as $contact)
            <tr id="contact{{$contact->id}}" class="active">
              <th>{{ $no++ }}</th>
              <th>{{ $contact->name }}</th>
              <th>{{ $contact->email }}</th>
              <th>{!! $contact->subject !!}</th>
              <td>{!! substr(strip_tags($contact->message), 0, 50) !!}{!! strlen(strip_tags($contact->message)) > 50 ? "..." : "" !!}</td>
              <td>{!! date('M j, Y', strtotime($contact->created_at)) !!}</td>
              <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-success" v-bind:title="messageshow"><span class="fa fa-eye"></span></a>
                <button class="btn btn-danger btn-delete delete-modal" v-bind:title="messagedelete" data-id="{{$contact->id}}" data-name="{{$contact->name}}" value="{{$contact->id}}"><span class="fa fa-trash-o"></span></button>
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

//delete a contact
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete contact');
    $('.dname').html($(this).data('name'));
    var contact_id = $(this).val();
    $('#deltbtn').val(contact_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('name'));
});

$(document).on('click', '.delete-contact', function() {
    var contact_id = $('#deltbtn').val();
    console.log(contact_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/contacts/' + contact_id,
        success: function(data) {
            console.log(data);
            $("#contact" + contact_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
