@extends('backend.layouts.admin')

@section('title', '| View FAQ')

@section('content')
    <div class="row modify-row-margin">
        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">Question</label>
                <p class="showQuestion">{!! $faq->question !!} </p>
            </div>
            <div class="form-group">
                <label class="control-label">Answer</label>
                <p class="showAnswer">{!! $faq->answer !!} </p>
            </div>
            <div class="form-group">
                <label class="control-label">Created</label>
                <p class="showCreatedAt">{!! $faq->created_at !!} </p>
            </div>
        </div>
        <div class="col-md-4">
            {!! Html::linkRoute('faqs.edit', 'Edit', array($faq->id), array('class' => 'btn btn-primary')) !!}
             {{ Html::linkRoute('faqs.index', trans('backend.all_faqs'), array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}

            {{ Html::linkRoute('faqs.create', trans('backend.add_new'), array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

            {!! Form::open(['route' => ['faqs.destroy', $faq->id], 'method'=>'DELETE']) !!}

            {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection