@if (Auth::user()->hasRole('policing')) 
    <li class="active"><a href="{{ route('profile.show', Auth::user()->id) }}"><i class="lnr lnr-home"></i> <span>Profile</span></a></li>
    <li class="">
    <li><a href="{{route('crimes.index')}}" class=""><i class="fa fa-gavel">
      </i> <span>Reported crimes</span></a>
    </li>
@endif
