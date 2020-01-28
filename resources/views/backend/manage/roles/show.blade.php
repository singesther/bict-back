@extends('backend.layouts.admin')

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-10">
        <h1 class="title">{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
        <h5>{{$role->description}}</h5>
      </div>
      <div class="col-md-2">
        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-user-plus m-r-10"></i> Edit this Role</a>
      </div>
    </div>
    <hr>
@endsection
