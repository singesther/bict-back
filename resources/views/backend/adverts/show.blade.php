@extends('backend.layouts.admin')

@section('title', '| advert')

@section('stylesheets')
<style type="text/css">
  .advert-image{
    margin: 20px 5px;
  }
  .details{
    margin: 20px 0px;
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="col-sm-8  text-center">
        <img class="advert-image" src="{{ asset('images/adverts/'. $advert->advert_image)}}">
      </div>
      <div class="col-sm-4 details">
        <p><label>Title:&nbsp; </label>{{$advert->title}}</p>
        <p><label>Url:&nbsp; </label>{{$advert->url}}</p>
        <p><label>Description:&nbsp; </label>{{$advert->description}}</p>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::decode(link_to_route('adverts.edit', '<i class="fa fa-pencil"></i> Edit', array($advert->id), array('class' => 'btn btn-primary btn-h1-spacing')))!!}

            @role('superadmin|admin')
              {!! Form::open(['route' => ['adverts.destroy', $advert->id], 'method'=>'DELETE']) !!}
              {!! Form::button('<span class="fa fa-trash-o"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-h1-spacing']) !!}
              {!! Form::close() !!}
            @endrole

          </div>
          <div class="col-sm-6">
            {{ Html::linkRoute('adverts.index', 'All adverts', array(), ['class' => 'btn btn-info btn-h1-spacing']) }}
        
            {!! Html::decode(link_to_route('adverts.create', '<i class="fa fa-plus"></i> Create New advert', array(), ['class' => 'btn btn-success btn-h1-spacing'])) !!}
          </div>
        </div>
    </div>

@endsection
