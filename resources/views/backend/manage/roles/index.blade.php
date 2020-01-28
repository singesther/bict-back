@extends('backend.layouts.admin')

@section('content')
    <div class="row modify-row-margin">
      <div class="dashboard-float1">
        <h3 class="title">Manage Roles</h3>
      </div>
      <div class="dashboard-float2">
        <a href="{{route('roles.create')}}" class="btn btn-primary btn-h1-spacing pull-right"><i class="fa fa-user-plus m-r-10"></i> Create New Role</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="row modify-row-margin">
      @foreach ($roles as $role)
        <div class="col-lg-4">
          <div class="panel panel-default">
              <div class="panel-body">
                <div class="content">
                  <h3 class="title">{{$role->display_name}}</h3>
                  <h4 class="subtitle"><em>{{$role->name}}</em></h4>
                  <p>
                    {{$role->description}}
                  </p>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-primary fullwidth">Details</a>
                  </div>
                  <div class="col-md-3">
                    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-default fullwidth">Edit</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection
