@if (Auth::user()->hasRole('superadmin|admin|secretary')) 
      <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>
      <li class="">
          <a href="#manage" class="has-arrow" aria-expanded="false"><i class="fa fa-empire"></i> <span>Manage</span></a>
          <ul aria-expanded="true">
            <li class=""><a href="{{route('users.index')}}"><i class="lnr lnr-users"></i> <span>Users</span></a></li>
            @if (Auth::user()->hasRole('superadmin')) 
              <li><a class="" href="{{route('roles.index')}}"><i class="lnr lnr-flag"></i>Roles</a></li>
            @endif
          </ul>
      </li>
      <li class="">
          <a href="#subPages" class="has-arrow" aria-expanded="false"><i class="fa fa-file-text"></i> <span>Pages</span></a>
          <ul aria-expanded="true">
            <li><a href="{{ route('pages.index') }}" class="">@lang('backend.all_pages')</a></li>
            <li><a href="{{ route('pages.create') }}">@lang('backend.add_new')</a></li> 
          </ul>
      </li>
      <li class="">
          <a href="#programs" class="has-arrow" aria-expanded="false"><i class="fa fa-tasks"></i> <span>Programs</span></a>
          <ul aria-expanded="true">
            <li><a href="{{ route('programs.index') }}" class="">All Programs</a></li>
            <li><a href="{{ route('programs.create') }}">New Program</a></li>
            <li><a href="{{ route('activities.index') }}" class="">All Activities</a></li>
            <!-- <li><a href="{{ route('activities.create') }}" class="">New Activity</a></li> -->
          </ul>
      </li>
      <li class="">
          <a href="#events" class="has-arrow" aria-expanded="false"><i class="fa fa-calendar"></i> <span>Events</span></a>
          <ul aria-expanded="true">
            <li><a href="{{ route('events.index') }}" class="">All events</a></li>
            <li><a href="{{ route('events.create') }}">@lang('backend.add_new')</a></li>  
          </ul>
      </li>
      <li class="">
          <a href="#news" class="has-arrow" aria-expanded="false"><i class="fa fa-newspaper-o"></i> <span>News</span></a>
          <ul aria-expanded="true">
            <li><a href="{{ route('news.index') }}" class="">All News</a></li>
            <li><a href="{{ route('news.create') }}">@lang('backend.add_new')</a></li>
            <li><a href="{{ route('categories.index') }}">@lang('backend.categories')</a></li>
            <li><a href="{{ route('tags.index') }}">@lang('backend.tags')</a></li>  
          </ul>
      </li>
      <li class="">
        <a href="#media" class="has-arrow" aria-expanded="false">
          <i class="fa fa-image"></i><span>Gallery</span>
        </a>
        <ul aria-expanded="true">
          <li><a href="{{ route('gallery.index') }}" class="">All Photos</a></li>
          <li><a href="{{ route('gallery.create') }}" class="">Add New</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#team" class="has-arrow" aria-expanded="false">
          <i class="fa fa-group"></i><span>Our Team</span>
        </a>
        <ul aria-expanded="true">
          <li><a href="{{ route('team.index') }}" class="">Team</a></li>
          <li><a href="{{ route('team.create') }}">Add New</a></li> 
        </ul>
      </li>
      <li class="">
        <a href="#testimonials" class="has-arrow" aria-expanded="false">
          <i class="fa fa-quote-left"></i><span>Testimonials</span>
        </a>
        <ul aria-expanded="true">
          <li><a href="{{ route('testimonials.index') }}" class="">All</a></li>
          <li><a href="{{ route('testimonials.create') }}">Add New</a></li> 
        </ul>
      </li>
      <li class=""><a href="{{ route('abouts.index') }}"><i class="fa fa-info-circle"></i> <span>About us</span></a></li>
      <li class="">
        <a href="#partners" class="has-arrow" aria-expanded="false">
          <i class="fa fa-handshake-o"></i><span>Partners</span>
        </a>
        <ul aria-expanded="true">
          <li><a href="{{ route('partners.index')}}" class="">All Partners</a></li>
          <li><a href="{{ route('partners.create') }}" class="">Add New</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#faqs" class="has-arrow" aria-expanded="false">
          <i class="fa fa-question-circle"></i><span>Faqs</span>
        </a>
        <ul aria-expanded="true">
          <li><a href="{{ route('faqs.index') }}" class="">All Faqs</a></li>
          <li><a href="{{ route('faqs.create') }}" class="">Add New</a></li>
        </ul>
      </li>
      <li class="">
        <a href="{{route('maillist.index')}}" class=""><i class="fa fa-paper-plane">
        </i> <span>@lang('backend.maillist')</span></a>
      </li>
      <li><a href="{{route('contacts.index')}}" class=""><i class="fa fa-comment">
        </i> <span>@lang('backend.messages')</span></a>
      </li>
      <li><a href="{{route('crimes.index')}}" class=""><i class="fa fa-gavel">
        </i> <span>Reported crimes</span></a>
      </li>
      <li><a href="{{route('activities.report')}}" class=""><i class="fa fa-history"></i> <span>Activities report</span></a>
      </li>
@endif
