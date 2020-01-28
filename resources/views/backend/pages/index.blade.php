@extends('backend.layouts.admin')

@section('title', '| All Pages')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
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
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="dashboard-float1">
        <h3>@lang('backend.all_pages')</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('pages.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i>@lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center modify-row-margin">
      <div class="col-md-4 col-md-offset-2">
        <h4>@lang('backend.published')({{ $approvedPages }})</h4>
      </div>
      <div class="col-md-4">
        <h4>@lang('backend.none_published')({{ $notapprovedPages }})</h4>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>


    <div class="row modify-row-margin">
      <div class="col-md-12 table-responsive">
        <table class="table" id="table">
          <thead>
              <th>No</th>
              <th>@lang('backend.title')</th>
              <th>Slug</th>
              <th>@lang('backend.content')</th>
              <th>@lang('backend.published')</th>
              <th>@lang('backend.created_at')</th>
              <th>Actions</th>
          </thead>

          <tbody id="pages-list" name="pages-list">
            <?php $no=1; ?>
            @foreach ($pages as $page)
              <tr id="page{{$page->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ substr(strip_tags($page->title), 0, 50) }}</td>
                <td>{{ $page->slug}}</td>
                <td>{{ substr(strip_tags($page->body), 0, 10) }}{{ strlen(strip_tags($page->body)) > 10 ? "..." : "" }}</td>
                @if($page->is_published == 0)
                  <td class="page-approved"><button class="btn btn-default" data-id="{{$page->id}}">No</button></td>
                @else
                  <td class="page-approved"><button class="btn btn-success" data-id="{{$page->id}}">Yes</button></td>
                @endif
                <td>{{ date('M j, Y', strtotime($page->created_at)) }}</td>
               <td class="">
                  <div class="btn-group">
                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('pages.show', $page->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') Page
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('pages.edit', $page->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') Page
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$page->id}}" data-title="{{$page->title}}" value="{{$page->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') Page
                              </button>
                          </li>
                          <li>
                              <form method="get" action="{{ route('pages.single', $page->slug) }}" target="_blank">
                                   <button target="_blank" href="{{ route('pages.single', $page->slug) }}" class="btn btn-success btn-sm btn-detail">
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
                        <button type="button" id="deltbtn" value="" class="btn btn-danger delete-page" data-dismiss="modal">
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
$('.page-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var page_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/pages/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'pageId': page_id,
              'pageApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('The page is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The page is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a page
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete page');
    $('.dname').html($(this).data('title'));
    var page_id = $(this).val();
    $('#deltbtn').val(page_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-page', function() {
    var page_id = $('#deltbtn').val();
    console.log(page_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/pages/' + page_id,
        success: function(data) {
            console.log(data);
            $("#page" + page_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
