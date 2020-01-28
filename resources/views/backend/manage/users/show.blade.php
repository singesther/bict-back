@extends('backend.layouts.admin')

@section('stylesheets')
<style type="text/css">
  .profile-img {
    width: 150px;
    height: 150px;
    margin-top: 10px;
  }
  .panel .panel-heading, .panel .panel-body {
    /*padding-left: 0px;
    padding-right: 0px;*/
  }
  .details{
    margin-top: 20px;
  }

</style>
@endsection

@section('content')
<div class="row modify-row-margin">
  <div class="dashboard-float1">
    <h3>View User Details</h3>
  </div> <!-- end of column -->
  <div class="dashboard-float2">
    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-user"></i> Edit User</a>
  </div>
</div>
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="profile-details">
             <div class="profile-header">
                <div class="overlay"></div>
                  <div class="profile-main">
                    <img src="{{ asset('images/users/'. $user->profile_image) }}" class="img-circle profile-img" alt="Avatar">
                    <h3 class="name">{{$user->name}}</h3>
                    <span class="online-status status-available">{{$user->profile->status}}</span>
                  </div>
              </div>
              <div class="details">
                <ul class="list-unstyled list-justify">
                  <li><b>Full name :</b> <span>{{$user->name}}</span></li>
                  <li><b>Phone Number :</b> <span>{{$user->tel}}</span></li>
                  <li><b>Email :</b> <span>{{$user->email}}</span></li>
                   @if($user->profile->province != null)
                  <li><b>Province :</b> <span>{{$user->profile->province}}</span></li>
                  @endif
                  @if($user->district != null)
                    <li><b>District :</b> <span>{{$user->district}}</span></li>
                  @endif
                  @if($user->profile->gender != null)
                    <li><b>Gender:</b> <span>{{$user->profile->gender}}</span></li>
                  @endif
                  @if($user->profile->dob != null)
                    <li><b>Date of birth:</b> <span>{{$user->profile->dob}}</span></li>
                  @endif
                  {{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : ''}}
                  @foreach ($user->roles as $role)
                    <li><b>Role :</b> <span>{{$role->display_name}}</span></li>
                  @endforeach
                  <li><b>Bio :</b> <span>{{$user->bio}}</span></li>
                </ul>
              </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
@endsection
