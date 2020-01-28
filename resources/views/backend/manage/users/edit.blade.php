@extends('backend.layouts.admin')

@section('stylesheets')

@endsection

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-12">
        <h3>Edit {{$user->name}}</h3>
      </div>
    </div>
    <hr>
    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="row modify-row-margin">
        <div class="col-md-5">
          <div class="form-group">
            <label for="name">Fullname:</label>
            <p class="control">
              <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </p>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <p class="control">
              <input type="text" class="form-control" name="tel" id="tel" value="{{$user->tel}}">
            </p>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <p class="control">
              <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </p>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
                <label for="roles">Roles:</label>
                <input type="hidden" name="roles" value="">
                <div id="rolesSelected" role="group" tabindex="-1" class="">
                 @foreach ($roles as $role)
                  <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" name="rolesSelected" value="{{$role->id}}" class="custom-control-input role-radio-btn" autocomplete="off" 
                      <?php echo $user->roles->contains($role->id)? 'checked="checked"' : '' ?>>
                      <label class="custom-control-label">{{$role->display_name}}</label>
                    </div>
                  </div>
                 @endforeach
                </div>
            </div>
          </div>
        </div> <!-- end of .column -->
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-body form-group">
              <label for="password">Password</label>
              <div id="password_options" role="radiogroup" tabindex="-1" class="">
                  <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="option_1" type="radio" name="password_options" autocomplete="off" class="custom-control-input" value="keep" checked="checked">
                      <label for="option_1" class="custom-control-label">Do Not Change Password</label>
                    </div>
                  </div> 
                  <div class="form-group">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input id="option_2" type="radio" name="password_options" autocomplete="off" value="auto" class="custom-control-input">
                          <label for="option_2" class="custom-control-label">Auto-Generate New Password</label>
                      </div>
                      <p class="input-group control auto-password hi-field">
                          <?php 
                              $length = 10;
                              $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
                              $str = '';
                              $max = mb_strlen($keyspace, '8bit') - 1;
                              for ($i = 0; $i < $length; ++$i) {
                                  $str .= $keyspace[random_int(0, $max)];
                              }
                          ?>
                          <input type="hidden" name="auto-pwd" value="{{$str}}">
                          <input type="text" class="form-control" name="" id="auto-generate-password" value="{{$str}}" placeholder="Click generate password"><span class="input-group-btn"><button class="btn btn-primary hidden" type="button">Generate Password</button></span>
                      </p>
                  </div>
                  <div class="form-group">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input id="option_3" type="radio" name="password_options" autocomplete="off" class="custom-control-input" value="manual">
                          <label for="option_3" class="custom-control-label">Manually Set New Password</label>
                      </div> 
                      <p class="control manual-password hi-field">
                        <input type="text" class="form-control" name="" id="manual-generate-password" placeholder="Manually give a password to this user">
                      </p>
                  </div>
              </div>
            </div>
          </div>
          <label>Status</label>
          <select class="form-control" id="status" name="status">
              <option value="Active" <?php echo ($user->profile->status=='Active')?'selected="Selected"':'';?>>Active</option>
              <option value="Desactive" <?php echo ($user->profile->status=='Desactive')?'selected="Selected"':'';?>>Desactive</option>
              <option value="Pending" <?php echo ($user->profile->status=='Pending')?'selected="Selected"':'';?>>Pending</option>
          </select> 
          <hr />
          <div style="width: 100%;">
            <button class="btn btn-primary pull-right" style="width: 40%px; margin: 0 auto;">Update User</button>
          </div>
        </div> <!-- end of .column -->
      </div>
    </form>
@endsection



@section('scripts')
  <script>

  $(function(){
    // $("input[name='roles']").val({!! $user->roles->pluck('id') !!});
    //Check previous a role
    var getIds = $("#rolesSelected input[checked='checked']").map(function() {
      return $( this ).val();
    }).get().join();
    console.log(getIds);
    $("input[name='roles']").val(getIds);


    //Check and get new role if roles are with radio buttons
    $(".role-radio-btn").click(function () {
        var value = $(this).val();
        console.log(value);
        $("input[name='roles']").val(value);
    });

    // //Check and get new roles if roles are with checkboxes
    // $("input[name='rolesSelected']").click(function(){
    //     var searchIDs = $("#rolesSelected input:checkbox:checked").map(function() {
    //       return $( this ).val();
    //     }).get().join();
    //     console.log(searchIDs);
    //     $("input[name='roles']").val(searchIDs);
    // });
  });

  $(function () {
    $(".hi-field").hide();
    $("input[name='password_options']").click(function () {
         var optionValue = $(this).val();
        if (optionValue == "auto") {
          $(".auto-password").show();
          $(".manual-password").hide();
          $('#auto-generate-password').attr('name', 'auto_password'); 
          $('#manual-generate-password').attr('name', '');
        } else if(optionValue == "manual"){
          $(".manual-password").show();
          $(".auto-password").hide();
          $('#manual-generate-password').attr('name', 'manual_password'); 
          $('#auto-generate-password').attr('name', '');
        }else{
          $(".auto-password").hide();
          $(".manual-password").hide();
          $('#auto-generate-password').attr('name', '');
          $('#manual-generate-password').attr('name', '');
        }
    });
  });
  </script>

@endsection
