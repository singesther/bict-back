@extends('backend.layouts.admin')

@section('title', '| All Tags')

@section('content')

<div class="row modify-row-margin">
	<div class="col-md-4">
		<div class="well form-spacing-top">
			{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
				<h3>New Tag</h3>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
	<div class="col-md-8">
		<h3>Tags</h3>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php $no=1; ?>
				@foreach ($tags as $tag)
				<tr>
					<td>{{ $no++ }}</td>
					<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
						<td class="text-center">
			                <div class="btn-group">
			                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			                        <span class="fa fa-ellipsis-v"></span> </a>
			                    <ul class="dropdown-menu" style="left: -50px;">
			                        <li>
			                           <button class="btn btn-warning btn-detail edit-modal" value="{{$tag->id}}"><span class="fa fa-pencil"></span>&nbsp;Edit Tag</button>
			                        </li>
			                        <!-- <li class="divider"></li> -->
			                        <li>
			                            <button class="btn btn-danger btn-delete btn-sm delete-modal" data-id="{{$tag->id}}" data-question="{{$tag->question}}" value="{{$tag->id}}"><span class="fa fa-trash-o"></span>&nbsp;Delete Tag
			                            </button>
			                        </li>
			                    </ul>
			                </div>
			            </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	</div>
    @foreach ($tags as $tag)
        @include('backend.tags.show')
        @include('backend.tags.edit')
        @include('backend.tags.delete')
    @endforeach
@endsection

@section('scripts')
<script type="text/javascript">
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

    // update existing faq ***************************
    $("#btn-update").click(function() {

        var state = $('#btn-update').val();
        var faq_id = $('#faq_id').val();
     
        $.ajax({
            type: "PUT", //for updating existing resource
            url:  url + '/' + faq_id,
            data: {
                '_token': $('input[name=_token]').val(),
                question : $('#editQuestion').val(),
                answer: $('#editAnswer').val(),
                language: $("select[name='modal-language']").val(),
            },
            success: function(data) {
                if ((data.errors)){
                    $('.errorQuestion').removeClass('hidden');
                    $('.errorQuestion').text(data.errors.question);
                    $('.errorAnswer').removeClass('hidden');
                    $('.errorAnswer').text(data.errors.answer);
                }
                else{
                    if (state == "update") { 
                        setTimeout(function(){ //wait for 2 secs
                         location.reload(); // the reload the page
                        }, 2000);
                    }
                    $('#frmEditFAQs').trigger("reset");
                    $('#editModal').modal('hide')
                    toastr.success('Successfully updated FAQ!', 'Success Alert', { timeOut: 5000 });
                }
                
            
            },
            error: function(data) {
                console.log('Error:', data);
                alert(data.responseText);
            }

        });
    });
</script>
@section

