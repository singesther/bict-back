@if (Auth::user()->hasRole('district-coordinator')) 
    <li class="active"><a href="{{ route('profile.show', Auth::user()->id) }}"><i class="lnr lnr-home"></i> <span>Profile</span></a></li>
    <li class="">
    <li class="">
        <a href="#programs" class="has-arrow" aria-expanded="false"><i class="fa fa-tasks"></i> <span>All Activities</span></a>
        <ul aria-expanded="true">
          <li><a href="{{ route('district.activities') }}" class="">{{$user->district}} Activities</a></li>
          <li><a href="{{ route('activities.index') }}" class="">All districts</a></li>
          <li><a href="{{ route('activities.create') }}" class="">New Activity</a></li>
        </ul>
    </li>
    <li><a href="{{route('activities.report')}}" class=""><i class="fa fa-history"></i> <span>Reported activities</span></a>
    </li>
    <li class="">
      <a href="{{route('district.members')}}" class=""><i class="fa fa-users">
      </i> <span>View {{Auth::user()->district}} district members</span></a>
    </li>
@endif
