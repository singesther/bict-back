@extends('backend.layouts.admin')

@section('title', '| All News')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .post-image {
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
        <h3>All News</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('news.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i> @lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center">
      <div class="col-md-4 col-md-offset-2">
        <h4>@lang('backend.published')({{ $approvedposts }})</h4>
      </div>
      <div class="col-md-4">
        <h4>@lang('backend.none_published')({{ $notapprovedposts }})</h4>
      </div>
    </div>
<!--     <div class="col-md-12">
      <hr>
    </div> -->


    <div class="row modify-row-margin">
      <div class="col-md-12 table-responsive">  
        <table class="table" id="table">
          <thead>
              <th>No</th>
              <th>Image</th>
              <th>@lang('backend.title')</th>
              <th>@lang('backend.comments')</th>
              <th>@lang('backend.category')</th>
              <th>@lang('backend.publish')</th>
              <th>@lang('backend.created_at')</th>
              <th>Actions</th>
          </thead>

          <tbody id="posts-list" name="posts-list">
            <?php $no=1; ?>
            @foreach ($posts as $post)
              <tr id="post{{$post->id}}">
                <td>{{ $no++ }}</td>
                <th><img class="post-image" src="{{ asset('images/news/'. $post->thumbnail) }}"></th>
                <td>{{ substr(strip_tags($post->title), 0, 50) }} </td>
                <td><p style=""><span class="fa fa-comment">&nbsp;{{ $post->comments()->count() }}</span> </p></td>
                <th>{{ $post->category->name }}</th>

                @if($post->is_published == 0)
                    <td class="post-approved"><button class="btn btn-default" data-id="{{$post->id}}">No</button></td>
                @else
                    <td class="post-approved"><button class="btn btn-success" data-id="{{$post->id}}">Yes</button></td>
                @endif

                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>

                <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('news.show', $post->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') @lang('backend.post')
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('news.edit', $post->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') @lang('backend.post')
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$post->id}}" data-title="{{$post->title}}" value="{{$post->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') @lang('backend.post')
                              </button>
                          </li>
                          <li>
                              <form method="get" action="{{ route('news.single', $post->slug) }}" target="_blank">
                                   <button target="_blank" href="{{ route('news.single', $post->slug) }}" class="btn btn-success btn-sm btn-detail">
                                      <span class="glyphicon glyphicon-eye-open"></span>&nbsp;@lang('backend.view_on_site')
                                  </button> 
                              </form>
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
      @foreach ($posts as $post)
          @include('backend.news.delete')
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
$('.post-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var post_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/news/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'postId': post_id,
              'postApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('Article is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('Article is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a post
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete post');
    $('.dname').html($(this).data('title'));
    var post_id = $(this).val();
    $('#deltbtn').val(post_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-post', function() {
    var post_id = $('#deltbtn').val();
    console.log(post_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/news/' + post_id,
        success: function(data) {
            console.log(data);
            $("#post" + post_id).remove();
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
