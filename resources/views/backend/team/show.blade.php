@extends('backend.layouts.admin')

@section('title', '| Team member')

@section('stylesheet')
<style type="text/css">
  .team-image {
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
      <div class="col-md-6 team-rgt">
        <div class="panel">
          <div class="panel-body">
              <img src="{{ asset('images/team/'. $team->image) }}" class="team-image img-responsive" alt="{{$team->name}}"/>
              <h3 class="">{{$team->name}}</h3>
              <h4 class="">{{$team->position}} - {{$team->group}}</h4>
              <p class="">{{$team->about}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        {!! Html::linkRoute('team.edit', 'Edit', array($team->id), array('class' => 'btn btn-primary btn-block btn-spacing')) !!}

        {{ Html::linkRoute('team.index', 'Our team', array(), ['class' => 'btn btn-info btn-block btn-spacing']) }}
 
        {{ Html::linkRoute('team.create', 'Add new', array(), ['class' => 'btn btn-success btn-block btn-spacing']) }}

        {!! Form::open(['route' => ['team.destroy', $team->id], 'method'=>'DELETE', 'class' => 'btn-spacing']) !!}
       
        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-spacing']) !!}

        {!! Form::close() !!}
      </div>
    </div>

@endsection
