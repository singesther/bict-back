@extends('backend.layouts.admin')

@section('title', '| Manage Users')

@section('stylesheets')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .profile-image {
    margin-right: 2px;
    width: 22px;
    height: 22px;
  }
</style>
@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="dashboard-float1">
        <h3>Manage Users</h3>
      </div>
      <div class="dashboard-float2">
  			<hr>
  		</div>
    </div>

    <div class="row modify-row-margin">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table" id="table">
          <thead>
            <tr>
              <th>id</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Email</th>
              <th>District</th>
              <th>Role</th>
              <th>Status</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
              <tr>
                <th>{{$user->id}}</th>
                <td><img src="{{ asset('images/users/'. $user->profile_image) }}" class="img-circle profile-image" alt="Avatar"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->district}}</td>
                <td>
                  {{$user->roles->count() == 0 ? 'No roles yet' : ''}}
                  @foreach ($user->roles as $role)
                    <label> {{$role->display_name}}</label> 
                  @endforeach
                </td>
                <td>{{$user->profile->status}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('users.show', $user->id)}}" class="btn btn-success btn-sm" title="View"><span class="fa fa-eye"></span></a>
                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div> <!-- end of .card -->
  <div class="text-center">
    {{$users->links()}}
  </div>
@endsection

@section('scripts')
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready( function () {
      $('#table').DataTable();
  } );

  $('#search').autocomplete({
    source:data
  })
</script>
@endsection