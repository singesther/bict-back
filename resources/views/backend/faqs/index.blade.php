@extends('backend.layouts.admin')

@section('title', '| All FAQs')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css"> 
<style type="text/css">
.panel .dropdown-menu li button, .dropdown-menu li a{
    width:100%;
    color: #fff;
    text-align: left;
}
.panel .btn-group .dropdown-menu .divider {
    background-color: #fff;
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
    color: #fff;
}
</style>
@endsection


@section('content')
    <div class="row modify-row-margin">
      <div class="dashboard-float1">
        <h3>Frequent Asked Questions</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{ route('faqs.create') }}" class="btn btn-primary btn-h1-spacing">
          <i class="lnr lnr-pencil"></i>@lang('backend.add_new')</a>
      </div>
    </div> <!-- end of .row -->
	<div class="row modify-row-margin form-spacing-top">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Question</th>
							<th>Answer</th>
							<th>Publish</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="faqs-list" name="faqs-list">
						<?php $no=1; ?>
						@foreach ($faqs as $faq)
						<tr id="faq{{$faq->id}}">
							<td class="col1">{{ $no++ }}</td>
							<td>{!! substr(strip_tags($faq->question), 0, 50) !!}{!! strlen(strip_tags($faq->question)) > 50 ? "..." : "" !!}</td>
							<td>{!! substr(strip_tags($faq->answer), 0, 50) !!}{!! strlen(strip_tags($faq->answer)) > 50 ? "..." : "" !!}</td>
							@if($faq->is_published == 0)
	                            <td class="faq-status"><button class="btn" data-id="{{$faq->id}}">No</button></td>
	                        @else
	                            <td class="faq-status"><button class="btn btn-success" data-id="{{$faq->id}}">Yes</button></td>
	                        @endif
							<td class="text-center">
	                            <div class="btn-group">
	                                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
	                                    <span class="fa fa-ellipsis-v"></span> </a>
	                                <ul class="dropdown-menu" style="left: -50px;">
	                                    <li>
                                            <button onclick="location.href ='{{ route('faqs.show', $faq->id) }}';" class="btn btn-success btn-detail btn-sm "><span class="fa fa-eye"></span>
                                             &nbsp;Show FAQ
                                          </button>
	                                    </li>
                                        <li>
                                          <button onclick="location.href ='{{ route('faqs.edit', $faq->id) }}';" class="btn btn-warning btn-detail btn-sm edit-modal"><span class="fa fa-pencil"></span>
                                             &nbsp;Edit FAQ
                                          </button>
                                        </li>
	                                    <!-- <li class="divider"></li> -->
	                                    <li>
	                                        <button class="btn btn-danger btn-delete btn-sm delete-modal" data-id="{{$faq->id}}" data-question="{{$faq->question}}" value="{{$faq->id}}"><span class="fa fa-trash-o"></span>&nbsp;Delete FAQ
	                                        </button>
	                                    </li>
	                                    <!-- <li class="divider"></li> -->
	                                    <li>
	                                        <form method="get" action="{{ route('faqs.all') }}" target="_blank">
	                                             <button target="_blank" href="{{ route('faqs.all')}}" class="btn btn-primary btn-detail btn-sm">
	                                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
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
		</div> <!-- end of .col-md-8 -->
    @foreach ($faqs as $faq)
        @include('backend.faqs.delete')
    @endforeach


		
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
$(document).ready(function() {
 //get base URL *********************
    var url = "/dashboard/faqs";

    // Show a faq
    $(document).on('click', '.show-modal', function() {
        var faq_id = $(this).val();

        $.ajax({
            type: "GET",
            url: url + '/' + faq_id,
            success: function(data) {
                console.log(data);
                $('.showQuestion').text(data.question);
                $('.showAnswer').text(data.answer);
                var d=new moment(data.created_at);
                $('.showCreatedAt').text(d.format("YYYY MMM DD hh:mm A"));
                $('#showModal').modal('show');
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

    //display modal form for faq EDIT ***************************
    $(document).on('click', '.edit-modal', function() {
        var faq_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + faq_id,
            success: function(data) {
                console.log(data);
                $('#faq_id').val(data.id);
                $('#editQuestion').val(data.question);
                $('#editAnswer').val(data.answer);
                $('#btn-update').val("update");
                $('#editModal').modal('show');
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

    //delete a faq
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Delete FAQ');
        $('.dname').html($(this).data('question'));
        var faq_id = $(this).val();
        $('#deltbtn').val(faq_id);
        $('#deleteModal').modal('show');
    });

    $(document).on('click', '.delete-faq', function() {

        var faq_id = $('#deltbtn').val();

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        $.ajax({
            type: 'DELETE',
            url: '/dashboard/faqs/' + faq_id,
            success: function(data) {
                console.log(data);
                $("#faq" + faq_id).remove();
                toastr.success(data['success'], 'Success Alert', { timeOut: 5000 });
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
});


$('.faq-status .btn').on('click', function () {

    $(this).toggleClass('btn-success');
    $(this).text(function(i, text){
        return text === "No" ? "Yes" : "No";
    });
    var faq_id = $(this).data('id');

    if($(this).hasClass('btn-success')){
        var statusNumb = 1;
    }else{
        var statusNumb = 0;
    }

    $.ajax({
        type: 'POST',
        url: '{{URL::to('/dashboard/faqs/toggle-approve')}}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
              'faqId': faq_id,
              'faqApproved': statusNumb
        },
        success: function(data) {
            // empty
            if(data.is_published == "1"){
              toastr.success('The FAQ is published', 'Success Alert', { timeOut: 2000 });
            }else{
              toastr.warning('The FAQ is not published', 'Warning Alert', { timeOut: 2000 });
            }

        },
        error: function(data) {
            console.log('Error:', data);
            alert(data.responseText);
        }

    });
});
</script>
@endsection