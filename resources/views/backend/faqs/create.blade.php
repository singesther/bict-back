@extends('backend.layouts.admin')

@section('title', '| Create a FAQ')

@section('stylesheets')
<style type="text/css">

</style>
@endsection


@section('content')
 <div class="row modify-row-margin">
    <div class="dashboard-float1">
     <h3>New FAQ</h3>
    </div>
    <div class="dashboard-float2">
        <a href="{{ route('faqs.index') }}" class="btn btn-primary btn-h1-spacing">
          <i class="fa fa-question-circle"></i>&nbsp; @lang('backend.faqs')</a>
    </div>
</div> <!-- end of .row -->
<div class="row modify-row-margin form-spacing-top">
    {!! Form::open(['route' => 'faqs.store', 'method' => 'POST']) !!}
        <div class="col-md-12 form-spacing-top">
            {{ Form::label('question', 'Question:') }}
            {{ Form::text('question', null, ['class' => 'form-control']) }}

            {{ Form::label('answer', 'Answer:', ['class' => 'form-spacing']) }}
            {{ Form::textarea('answer', null, ['class' => 'form-control my-editor', 'id' => 'answer-ckeditor']) }}

            {{ Form::submit('Create New FAQ', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
        </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>

<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    // CKEDITOR.replace('answer-ckeditor');
    CKEDITOR.replace('answer-ckeditor', options);
</script>

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