@extends('backend.layouts.admin')

@section('title', '| Abouts')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .about-image {
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
        <h3>@lang('backend.abouts')</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('abouts.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i> @lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center">
      <div class="col-md-4 col-md-offset-2">
        <h4>@lang('backend.published')({{ $approvedabouts }})</h4>
      </div>
      <div class="col-md-4">
        <h4>@lang('backend.none_published')({{ $notapprovedabouts }})</h4>
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
              <th>@lang('backend.title')</th>
              <th>@lang('backend.content')</th>
              <th>@lang('backend.publish')</th>
              <th>@lang('backend.created_at')</th>
              <th>Actions</th>
          </thead>

          <tbody id="abouts-list" name="abouts-list">
            <?php $no=1; ?>
            @foreach ($abouts as $about)
              <tr id="about{{$about->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ substr(strip_tags($about->title), 0, 50) }} </td>
                <td>{{ substr(strip_tags($about->content), 0, 50) }} </td>

                @if($about->is_published == 0)
                    <td class="about-approved"><button class="btn btn-default" data-id="{{$about->id}}">No</button></td>
                @else
                    <td class="about-approved"><button class="btn btn-success" data-id="{{$about->id}}">Yes</button></td>
                @endif

                <td>{{ date('M j, Y', strtotime($about->created_at)) }}</td>

                <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('abouts.show', $about->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') @lang('backend.about')
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('abouts.edit', $about->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') @lang('backend.about')
                              </button>
                          </li>
                         <!--  <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$about->id}}" data-title="{{$about->title}}" value="{{$about->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') @lang('backend.about')
                              </button>
                          </li> -->
                      </ul>
                  </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
      @foreach ($abouts as $about)
          @include('backend.abouts.delete')
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
$('.about-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var about_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/abouts/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'aboutId': about_id,
              'aboutApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('About us content are published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('About us content are not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});

//delete a about
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete about');
    $('.dname').html($(this).data('title'));
    var about_id = $(this).val();
    $('#deltbtn').val(about_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-about', function() {
    var about_id = $('#deltbtn').val();
    console.log(about_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/abouts/' + about_id,
        success: function(data) {
            console.log(data);
            $("#about" + about_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});

</script>
@endsection
