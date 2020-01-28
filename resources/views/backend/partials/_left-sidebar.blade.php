 <!-- LEFT SIDEBAR -->
    <div id="left-sidebar" class="sidebar">
      <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
        <span class="sr-only">Toggle Fullwidth</span>
        <i class="fa fa-angle-left"></i>
      </button>
      <div class="sidebar-scroll">
        <div class="user-account">
          <img src="{{ asset('images/users/'.  Auth::user()->profile_image) }}" class="img-responsive img-circle user-photo" alt="User Profile Picture">
          <div class="dropdown">
            <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>{{ Auth::user()->name }} </strong> <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-right account">
              <li><a href="{{ url('dashboard/profile/'.Auth::user()->id) }}">My Profile</a></li>
              <li><a href="{{route('messages.index')}}">Messages</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </div>
              <?php  $user = App\User::where('id', Auth::user()->id)->with('roles')->first(); ?>
              Location: <label><span>{{$user->district}}</span></label><br>
              @if($user->roles->count() == 0 )
              <span> Role: </span><label>No roles yet</label>
              @endif
              @foreach ($user->roles as $role)
              <span>Role: </span><label>{{$role->display_name}}</label>
              @endforeach
              <br>
              <span>Status: </span>
                @if($user->profile->status == 'Active' )
                  <label class="label label-success">
                @elseif($user->profile->status == 'Desactive')
                  <label class="label label-danger">
                @elseif($user->profile->status == 'Pending')
                  <label class="label label-warning">
                @endif
                {{ $user->profile->status}} 
              </label>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
          <ul id="main-menu" class="metismenu">
            @include('backend.partials._admin')
            @include('backend.partials._policing')
            @include('backend.partials._district_coordinator')
            @include('backend.partials._member')
          </ul>
        </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->