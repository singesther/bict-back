@extends('backend.layouts.main')

@section('title', '| Profile')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/datepicker/jquery.datetimepicker.css"/>
<style type="text/css">
  .profile-img {
    width: 150px;
    height: 150px;
  }
  .panel .panel-heading, .panel .panel-body {
    padding-left: 0px;
    padding-right: 0px;
    /*padding-top: 0px;*/
  }
  .details{
    margin-top: 20px;
  }
  .profile-details{
    padding-left: 1em;
    padding-right: 1em;
  }
  .panel-default{
    margin-top: 20px;
  }
</style>
@endsection

@section('content')
  <!-- MAIN CONTENT -->
  <h1 class="sr-only">Profile</h1>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="profile-details">
            <div class="profile-header text-center">
                <div class="overlay"></div>
                <div class="profile-main">
                  <img src="{{ asset('images/users/'. $user->profile_image) }}" class="img-circle profile-img" alt="Avatar">
                  <h3 class="name">{{$user->name}}</h3>
                </div>
            </div>
            <div class="details">
              <ul class="list-unstyled list-justify">
                <li><b>@lang('auth.name') :</b> <span>{{$user->name}}</span></li>
                <li><b>@lang('auth.phone_number') :</b> <span>{{$user->tel}}</span></li>
                <li><b>@lang('auth.email_address') :</b> <span>{{$user->email}}</span></li>
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
                  <li><b>@lang('backend.role') :</b> <span>{{$role->display_name}}</span></li>
                @endforeach
                <li><b>@lang('backend.about_me') :</b> <span>{{$user->bio}}</span></li>
              </ul>
            </div>
            <div class="panel-body text-center">
            @if(Auth::id() == $user->id)
              <div class="">
                {!! Html::linkRoute('profile.edit', 'Edit Profile' , array($user->id), array('class' => 'btn btn-primary btn-spacing')) !!}
              </div>
            @endif
          </div>
        </div>    
      </div>
    </div>
  </div>
</div>
@endsection
