@if (Auth::user()->hasRole('member'))
    <li class="active"><a href="{{ route('profile.show', Auth::user()->id) }}"><i class="lnr lnr-home"></i> <span>Profile</span></a></li>
  	<li class="">
      <a href="#subPages" class="has-arrow" aria-expanded="false"><i class="lnr lnr-file-empty"></i> <span>Report crime</span></a>
      <ul aria-expanded="true">
      <li><a href="{{ route('reported.crimes') }}" class="">All crimes</a></li>
	        <li><a href="{{ route('report.crime') }}">Report a crime</a></li>	
      </ul>
    </li>
@endif