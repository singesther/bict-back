@extends('backend.layouts.admin')

@section('title', '| Contact')

@section('stylesheet')
<style type="text/css">
  .contact-image {
    max-width: 200px;
    height: 200px;
    border: 5px solid #fff;
    border-radius: 50%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="col-sm-8"></div>
      <div class="col-sm-2">
        {{ Html::linkRoute('contacts.index', 'View all Messages', array(), ['class' => 'btn btn-info btn-block btn-h1-spacing']) }}
      </div>
    </div>
    <div class="row modify-row-margin">
        <div class="container">
            <label>From</label>
            <p><b>Name:</b> {{$contact->name}}</p>
            <p><b>Email:</b> {{$contact->email}}</p>
            <p><b>Subject:</b> {!! $contact->subject !!}</p>
            <p><b>Message:</b> {!! $contact->message !!}</p>
        </div>
    </div>
<!--     <div class="row">
      <div class="col-sm-2">
        {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method'=>'DELETE']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-h1-spacing']) !!}

        {!! Form::close() !!}
      </div>
    </div> -->

@endsection
