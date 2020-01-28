@extends('backend.layouts.admin')

@section('title', '| Partner')

@section('stylesheets')
<style type="text/css">
  .partner-image {
width: 22px;
height: 22px;
  }
</style>
@endsection

@section('content')
  <div class="row modify-row-margin">
    <div class="col-md-9">
      <h3>@lang('backend.partners')</h3>
    </div>

    <div class="col-md-2">
      <a href="{{ route('partners.create') }}" class="btn btn-block btn-primary btn-h1-spacing"><span class="fa fa-plus-circle"> @lang('backend.add_new')</a>
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
          <th>@lang('backend.picture')</th>
          <th>@lang('backend.title')</th>
          <th>@lang('backend.published')</th>
          <th>@lang('backend.created_at')</th>
          <th>@lang('backend.last_updated')</th>
          <th>Actions</th>
        </thead>

        <tbody id="partners-list" name="partners-list">
          <?php $no=1; ?>
          @foreach ($partners as $partner)
            <tr id="partner{{$partner->id}}">
              <td>{{ $partner->id }}</td>
              <td><img class="partner-image" src="{{ asset('images/partners/'. $partner->logo)}}"></td>
              <td>{{ substr(strip_tags($partner->name), 0, 25) }}</td>
              @if($partner->is_published == 0)
                <td class="partner-approved"><button class="btn btn-default" data-id="{{$partner->id}}">No</button></td>
              @else
                <td class="partner-approved"><button class="btn btn-success" data-id="{{$partner->id}}">Yes</button></td>
              @endif
              <td>{{ date('M j, Y', strtotime($partner->created_at)) }}</td>
              <td>{{ date('M j, Y', strtotime($partner->updated_at)) }}</td>
               <td class="">
                  <div class="btn-group">
                      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-ellipsis-v"></span> </a>
                      <ul class="dropdown-menu" style="left: -50px;">
                          <li>
                              <button onclick="location.href ='{{ route('partners.show', $partner->id) }}';" class="btn btn-primary btn-sm show-modal"><span class="fa fa-eye"></span>&nbsp;@lang('backend.show') partner
                              </button>
                          </li>
                          <li>
                              <button onclick="location.href ='{{ route('partners.edit', $partner->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                 &nbsp;@lang('backend.edit') partner
                              </button>
                          </li>
                          <li>
                              <button class="btn btn-danger btn-sm btn-delete delete-modal" data-id="{{$partner->id}}" data-title="{{$partner->name}}" value="{{$partner->id}}"><span class="fa fa-trash-o"></span>&nbsp;@lang('backend.delete') partner
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
  @foreach ($partners as $partner)
    @include('backend.partners.delete')
  @endforeach
@stop

@section('scripts')
<script src="/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$('.partner-approved .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var partner_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var approvedNumb = 1;
    }else{
        var approvedNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/partners/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'partnerId': partner_id,
              'partnerApproved': approvedNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('The partner is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The partner is not published', 'Warning Alert', { timeOut: 2000 });
            }
        },
        error: function(data) {
          console.log('Error:', data);
          alert(data.responseText);
        }

    });
});

//delete a partner
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete partner');
    $('.dname').html($(this).data('title'));
    var partner_id = $(this).val();
    $('#deltbtn').val(partner_id);
    $('#deleteModal').modal('show');
    console.log($(this).data('id'));
    console.log($(this).data('title'));

});

$(document).on('click', '.delete-partner', function() {
    var partner_id = $('#deltbtn').val();
    console.log(partner_id);

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        type: 'DELETE',
        url: '/dashboard/partners/' + partner_id,
        success: function(data) {
            console.log(data);
            $("#partner" + partner_id).remove();
            toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
