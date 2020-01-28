@extends('backend.layouts.admin')

@section('title', '| Testimonials')

@section('stylesheets')
<style type="text/css">
  .testimonial-image {
    width: 32px;
    height: 32px;
  }
</style>
@endsection

@section('content')
  <div class="row modify-row-margin">
    <div class="col-md-9">
      <h3>All testimonials</h3>
    </div>

    <div class="col-md-2">
      <a href="{{ route('testimonials.create') }}" class="btn btn-block btn-primary btn-h1-spacing"><span class="fa fa-plus-circle"> @lang('backend.add_new')</a>
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
          <th>Creator Pic</th>
          <th>Creator name</th>
          <th>Approval</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th>Operations</th>
        </thead>

        <tbody id="testimonials-list" name="testimonials-list">
          <?php $no=1; ?>
          @foreach ($testimonials as $testimonial)
            <tr id="testimonial{{$testimonial->id}}">
              <td>{{ $no++ }}</td>
              <th><img class="testimonial-image" src="{{ asset('images/testimonials/'. $testimonial->file_name)}}"></th>
              <td>{{ substr(strip_tags($testimonial->creator_name), 0, 25) }}</p></td>
              @if($testimonial->live == 0)
                  <td class="testimonial-approved"><button class="btn btn-default" data-id="{{$testimonial->id}}">No</button></td>
              @else
                  <td class="testimonial-approved"><button class="btn btn-success" data-id="{{$testimonial->id}}">Yes</button></td>
              @endif
              <td>{{ date('M j, Y', strtotime($testimonial->created_at)) }}</td>
              <td>{{ date('M j, Y', strtotime($testimonial->updated_at)) }}</td>
              <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('testimonials.show', $testimonial->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') testimonial
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('testimonials.edit', $testimonial->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') testimonial
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$testimonial->id}}" data-title="{{$testimonial->creator_name}}" value="{{$testimonial->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') testimonial
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
  @foreach ($testimonials as $testimonial)
      @include('backend.testimonials.delete')
  @endforeach
@stop

@section('scripts')
<script src="/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$('.testimonial-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var testimonial_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/testimonials/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'testimonialId': testimonial_id,
              'testimonialApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.live == "1"){
              toastr.success('The testimonial is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The testimonial is not published', 'Warning Alert', { timeOut: 2000 });
            }
        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a testimonial
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete testimonial');
    $('.dname').html($(this).data('title'));
    var testimonial_id = $(this).val();
    $('#deltbtn').val(testimonial_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));
});

$(document).on('click', '.delete-testimonial', function() {
    var testimonial_id = $('#deltbtn').val();
    console.log(testimonial_id);
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/testimonials/' + testimonial_id,
        success: function(data) {
          console.log(data);
          $("#testimonial" + testimonial_id).remove();
          toastr.success(data['success']+'\'s testimonial', 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
          console.log('Error:', data);
          alert(data.responseText);
        }
    });
});
</script>
@endsection
