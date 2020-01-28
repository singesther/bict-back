@extends('backend.layouts.admin')

@section('title', '| Partner')

@section('stylesheets')
<style type="text/css">
  .partner-image {
    width: 250px;
    height: 250px;
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin form-spacing">
      <div class="col-md-7 team-rgt">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <img class="partner-image" src="{{ asset('images/partners/'. $partner->logo)}}">
            <h4>{{$partner->name}}</h4>
            <h4>{{$partner->address}}</h4>

            <h4>{{$partner->website}}</h4>
            <p>{{$partner->description}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        {!! Html::linkRoute('partners.edit', 'Edit', array($partner->id), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
      
        {{ Html::linkRoute('partners.index', 'All partners', array(), ['class' => 'btn btn-info btn-block btn-h1-spacing']) }}
     
        {{ Html::linkRoute('partners.create', 'Add new partner', array(), ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
      
        {!! Form::open(['route' => ['partners.destroy', $partner->id], 'method'=>'DELETE']) !!}

        {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-h1-spacing btn-block']) !!}

        {!! Form::close() !!}
      </div>
    </div>

@endsection
