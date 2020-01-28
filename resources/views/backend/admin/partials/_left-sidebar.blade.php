 <!-- LEFT SIDEBAR -->
    <div id="left-sidebar" class="sidebar">
      <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
        <span class="sr-only">Toggle Fullwidth</span>
        <i class="fa fa-angle-left"></i>
      </button>
      <div class="sidebar-scroll">
        <div class="user-account">
          <img src="{{ asset('images/users/'.  Auth::user()->profile_image) }}" class="img-responsive user-photo" alt="User Profile Picture">
          <div class="dropdown">
            <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>{{ Auth::user()->name }} </strong> <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-right account">
              <li><a href="{{ url('dashboard/profile/'.Auth::user()->id) }}">My Profile</a></li>
              <li><a href="{{route('messages.index')}}">Messages</a></li>
              <li><a href="#">Settings</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
          <ul id="main-menu" class="metismenu">
           
          </ul>
        </nav>
      </div>
    </div>
<!-- END LEFT SIDEBAR -->