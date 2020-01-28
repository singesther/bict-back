@extends('backend.layouts.main')

@section('title', '| Edit Profile')

@section('stylesheets')
<link rel="stylesheet" href="/backend/vendor/bootstrap-datepicker/bootstrap-datepicker3.css">
<style type="text/css">
  .profile-img {
    width: 150px;
    height: 150px;
    /*border: 5px solid #fff;*/
    /*border-radius: 100%;*/
    /*box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);*/
  }
  .panel-default{
    margin-top: 20px;
  }
</style>
@endsection


@section('content')
  @if(Auth::id() == $user->id)
    <div class="container-fluid">
      <div class="section-heading">
        <h1 class="page-title">User Profile</h1>
      </div>
      <ul class="nav nav-tabs" role="tablist">
        <li class="myprofile active">
          <a href="#myprofile" aria-controls="myprofile" role="tab" data-toggle="tab">My Profile</a>
        </li>
        <li class="account">
          <a href="#account" aria-controls="account" role="tab" data-toggle="tab">Change Password</a>
        </li>
      </ul>
      <div class="tab-content content-profile">
        <!-- MY PROFILE -->
        <div class="tab-pane fade in active" id="myprofile">
          {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="profile-section">
              <h2 class="profile-heading">Profile Photo</h2>
              <div class="media">
                <div class="media-left">
                  <img src="{{ asset('images/users/'. $user->profile_image) }}" class="user-photo media-object" id="uploadedimage" alt="User">
                </div>
                <div class="media-body">
                  <p>
                    Upload your photo.
                    <br> <em>Image should not exceed 5MB</em>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                  </p>
           
                  <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button>
                  {{ Form::file('profile_image', ['id' => 'filePhoto', 'class' => 'sr-only']) }}
                </div>
              </div>
            </div>
            <div class="profile-section">
              <h2 class="profile-heading">Basic Information</h2>
              <div class="clearfix">
                <!-- LEFT SECTION -->
                <div class="left">
                  {{ Form::label('name', 'Full Name', ['class' => 'form-spacing-top']) }}
                  {{ Form::text('name', null, ["class" => 'form-control']) }}

                  {{ Form::label('email', trans('auth.email_address'), ['class' => 'form-spacing-top']) }}
                  {{ Form::text('email', null, ['class' => 'form-control']) }}

                  {{ Form::label('tel', trans('auth.phone_number'), ['class' => 'form-spacing-top']) }}
                  {{ Form::text('tel', null, ['class' => 'form-control']) }}

                  <div class="form-group">
                    <label>Gender</label>
                    <div>
                      <label class="fancy-radio">
                        <input name="gender" value="male" type="radio" <?php echo ($user->profile->gender == 'male')?'checked="checked"':'';?>>
                        <span><i></i>Male</span>
                      </label>
                      <label class="fancy-radio">
                        <input name="gender" value="female" type="radio" <?php echo ($user->profile->gender == 'female')?'checked="checked"':'';?>>
                        <span><i></i>Female</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Birthdate</label>
                    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" class="form-control" name="dob" value="{{$user->profile->dob}}">
                    </div>
                  </div>
                </div>
                <!-- END LEFT SECTION -->
                <!-- RIGHT SECTION -->
                <div class="right">
                  {{ Form::label('province', 'Province', ['class' => 'form-spacing-top']) }}
                  <select id="province" name="province" class="form-control" aria-invalid="false">
                    <option value="Kigali City" id="1" name="Kigali City"
                    <?php echo ($user->profile->province == 'Kigali City')?'selected="Selected"':'';?>>Kigali City</option>
                    <option value="Southern province" id="2" name="Southern province"
                    <?php echo ($user->profile->province == 'Southern province')?'selected="Selected"':'';?>>Southern province</option>
                    <option value="Western province" id="3" name="Western province"
                    <?php echo ($user->profile->province == 'Western province')?'selected="Selected"':'';?>>Western province</option>
                    <option value="Northern province" id="4" name="Northern province"
                    <?php echo ($user->profile->province == 'Northern province')?'selected="Selected"':'';?>>Northern province</option>
                    <option value="Eastern province" id="5" name="Eastern province"
                    <?php echo ($user->profile->province == 'Eastern province')?'selected="Selected"':'';?>>Eastern province</option>
                  </select>

                  {{ Form::label('district', 'District', ['class' => 'form-spacing-top']) }}
                  {{ Form::text('district', null, ['class' => 'form-control']) }}

                  {{ Form::label('bio', trans('backend.about_me'), ['class' => 'form-spacing-top']) }}
                  {{ Form::textarea('bio', null, ['class' => 'form-control']) }}
                </div><!-- END RIGHT SECTION -->
                <div class="col-md-12" style="padding-left: 0px;">
                  <p class="margin-top-30">
                    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }} &nbsp;&nbsp;
                    {!! Html::linkRoute('profile.show', trans('backend.cancel'), array($user->id), array('class' => 'btn btn-default')) !!}
                  </p>
                </div>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- END MY PROFILE -->
        <!-- CHANGE PASSWORD -->
        <div class="tab-pane fade" id="account">
          <div class="profile-section">
            <div class="clearfix">
              <!-- LEFT SECTION -->
              <div class="left">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">Current Password</label>

                        <div class="col-md-6">
                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">New Password</label>

                        <div class="col-md-6">
                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                        <div class="col-md-6">
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                    </div>
                   <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Change Password
                  </button>
              </div>
          </div>
      </form>
              </div>
              <!-- END LEFT SECTION -->
            </div>
       <!--      <p class="margin-top-30">
              <button type="button" class="btn btn-primary">Update</button> &nbsp;&nbsp;
              <button class="btn btn-default">Cancel</button>
            </p> -->
          </div>
        </div><!-- END CHANGE PASSWORD -->
    </div>
  </div>
  @endif
@stop

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function () {
        if (window.location.hash == '#account') {
            $('li.myprofile').removeClass('active');//remove active class
            $('div#myprofile').removeClass('active');
            $('li.account').addClass('active');
            $('div#account').addClass('in active');
        }
    });
  </script>
  <!-- Picking a date of birth with a calendar -->
  <script src="/backend/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script>
	$('.date-picker').datetimepicker();
	</script>

  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
            $('#btn-upload-photo').on('click', function() {
              $(this).siblings('#filePhoto').trigger('click');
            });

             document.getElementById("filePhoto").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 500000000) {
                         $('#imageerror').text('Image too large');
                         $filePhoto = $("#filePhoto");
                         $filePhoto.val("");
                         $filePhoto.wrap('<form>').closest('form').get(0).reset();
                         $filePhoto.unwrap();
                         $('#uploadedimage').removeAttr('src');
                         return;
                     }
                     $('#imageerror').text('');
                     document.getElementById("uploadedimage").src = e.target.result;
                 };
                 reader.readAsDataURL(this.files[0]);
             };
         });
  </script>
  <script>

    $(document).ready(function () {
        $('.material-button-toggle').on("click", function () {
            $(this).toggleClass('open');
            $('.option').toggleClass('scale-on');
        });
    });
  </script>
@endsection
