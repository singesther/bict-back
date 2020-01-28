<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
        </div>
        <!-- logo -->
        <div class="navbar-brand" style="padding: 3px 0px;">
          <a href="/"><img src="/images/logo-2.png" alt="Rwanda Youth Volunteer Logo" class="img-responsive logo" style="background: #c03b37;"></a>
        </div>
        <!-- end logo -->
        <div class="navbar-right">
          <!-- search form -->
          <form id="navbar-search" class="navbar-form search-form">
            <input value="" class="form-control" placeholder="Search here..." type="text">
            <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
          </form>
          <!-- end search form -->
          <!-- navbar menu -->
          <div id="navbar-menu">
            <ul class="nav navbar-nav">
              <li><a href="/" class=""><i class="fa fa-home">
                </i> <span>Home</span></a>
              </li>
              <li class="dropdown hidden">
                <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                  <i class="lnr lnr-alarm"></i>
                  <span class="notification-dot"></span>
                </a>
                <ul class="dropdown-menu notifications">
                  <li>
                    <a href="#">
                      <div class="media">
                        <div class="media-left">
                          <i class="fa fa-fw fa-flag-checkered text-muted"></i>
                        </div>
                        <div class="media-body">
                          <p class="text">Your campaign <strong>Holiday Sale</strong> is starting to engage potential customers.</p>
                          <span class="timestamp">24 minutes ago</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                  <i class="lnr lnr-cog"></i>
                </a>
                <ul class="dropdown-menu user-menu menu-icon">
                  <li class="menu-heading">ACCOUNT SETTINGS</li>
                  <li><a href="{{ url('dashboard/profile/'.Auth::user()->id) }}">
                    <i class="fa fa-user"></i> My Profile</a></li>
                  <li><a href="{{ route('profile.edit', 'Auth::user()->id')}}#account">
                    <i class="fa fa-key"></i> Change Password</a></li>
                  <li><a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- end navbar menu -->
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->