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
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('volunteers.index')}}" class="btn btn-primary"><i class="fa fa-user m-r-10"></i> View All Volunteers</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
    <div class="col-md-12">
      <h3>View Volunteer Details</h3>
    </div> <!-- end of column -->
  </div>
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="profile-header">
                  <div class="overlay"></div>
          <div class="profile-main">
            <img src="{{ asset('images/users/'. $user->user_image) }}" class="img-circle profile-img" alt="Avatar">
            <h3 class="name">{{$user->name}}</h3>
          </div>
          </div>
            <div class="details">
              <ul class="list-unstyled list-justify">
                <li><b>Full name :</b> <span>{{$user->name}}</span></li>
                <li><b>Phone number :</b> <span>{{$user->phone_number}}</span></li>
                <li><b>Email :</b> <span>{{$user->email}}</span></li>
                <li><b>About me:</b> <span>{{$user->about}}</span></li>
              </ul>
            </div>
            <div class="panel-body text-center">
              @if(Auth::id() == $user->id)
                <div class="">
                  {!! Html::linkRoute('profile.edit', 'Edit Profile', array($user->phone_number), array('class' => 'btn btn-primary')) !!}
                </div>
              @endif
            </div>
        </div>
      </div>
    </div>
@endsection
