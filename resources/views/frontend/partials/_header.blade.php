<!-- Navigation -->
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="60" style="background-color: #083545;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/images/logo.jpg" alt="Site Logo" id="logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" id="one-page-nav">
                <li><a href="/#banner">Home</a></li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#who_we_are" role="button" aria-haspopup="true" aria-expanded="false">Who we are</a>
                        <div class="dropdown-content">
                            <a href="/#mission_vision">Mission & Vision</a>
                            <a href="/#testimonial_section">Testimonial</a>
                            <a href="/#our_team">Our Team</a>
                            <a href="/#our_partners">Our Partners</a>
                        </div>
                </li>
                <li><a href="/#what_we_do">What we do</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#media" role="button" aria-haspopup="true" aria-expanded="false">Media</a>
                    <div class="dropdown-content">
                        <a href="/#newsroom">News</a>
                        <a href="/#events">Events</a>
                        <a href="/#gallery">Gallery</a>
                    </div>
                </li>
                <li><a href="/#contact">Contact Us</a></li>
                @if (Auth::check())
                    <li class="dropdown auth-user">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/users/'.  Auth::user()->profile_image) }}"
                        class="img-circle" alt="Avatar" style="width: 20px;">
                        <i class="fa fa-chevron-down"></i>
                      </a>
                      <ul class="dropdown-menu wet-asphalt">
                        @role('superadmin|admin')
                        <li><a href="{{route('dashboard')}}" class=""><i class="lnr lnr-home">
                            </i> <span>@lang('backend.dashboard')</span></a>
                        </li>
                        @endrole
                        <li>
                          <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="lnr lnr-user"></i>
                           <span>@lang('auth.profile')</span></a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="lnr lnr-exit"></i> <span>@lang('auth.logout')</span></a></li>
                      </ul>
                    </li>
                @else
                    <li><a onclick="document.getElementById('login-link').style.display='block'">Login</a></li>
                    <li><a class="btn" onclick="document.getElementById('register-link').style.display='block'" style="background-color: #c03b37;">Become a member</a></li>
                @endif
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Navigation End -->