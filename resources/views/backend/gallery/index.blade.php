@extends('backend.layouts.admin')

@section('title', '| Gallery')

@section('stylesheets')
<style type="text/css">
  .gallery-image {
    width: 32px;
    height: 32px;
  }
</style>
@endsection

@section('content')
  <div class="row modify-row-margin">
    <div class="col-md-9">
      <h3>@lang('backend.gallery')</h3>
    </div>

    <div class="col-md-2">
      <a href="{{ route('gallery.create') }}" class="btn btn-block btn-primary btn-h1-spacing"><span class="fa fa-plus-circle"> @lang('backend.add_new')</a>
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
          <th>Picture</th>
          <th>Title</th>
          <th>Approval</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th>Operations</th>
        </thead>

        <tbody id="gallery-list" name="gallery-list">
          <?php $no=1; ?>

          @foreach ($gallery as $gallery)
            <tr id="gallery{{$gallery->id}}">
              <td>{{ $no++ }}</td>
              <td><img class="gallery-image" src="{{ asset('images/gallery/'. $gallery->file_name)}}"></td>
              <td>{{ substr(strip_tags($gallery->title), 0, 25) }}</td>
              @if($gallery->is_published == 0)
                  <td class="gallery-approved"><button class="btn btn-default" data-id="{{$gallery->id}}">No</button></td>
              @else
                  <td class="gallery-approved"><button class="btn btn-success" data-id="{{$gallery->id}}">Yes</button></td>
              @endif
              <td>{{ date('M j, Y', strtotime($gallery->created_at)) }}</td>
              <td>{{ date('M j, Y', strtotime($gallery->updated_at)) }}</td>
              <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('gallery.show', $gallery->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') file
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('gallery.edit', $gallery->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') file
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$gallery->id}}" data-title="{{$gallery->title}}" value="{{$gallery->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') file
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
  @foreach ($gallery as $gallery)
      @include('backend.gallery.delete')
  @endforeach
@stop

@section('scripts')
<script src="/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
$('.gallery-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var gallery_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/gallery/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'galleryId': gallery_id,
              'galleryApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('The image is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The image is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a gallery
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete gallery');
    $('.dname').html($(this).data('title'));
    var gallery_id = $(this).val();
    $('#deltbtn').val(gallery_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-gallery', function() {
    var gallery_id = $('#deltbtn').val();
    console.log(gallery_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/gallery/' + gallery_id,
        success: function(data) {
            console.log(data);
            $("#gallery" + gallery_id).remove();
            toastr.success('Image with name: '+data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }
    });
});
</script>
@endsection
