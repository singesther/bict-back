@extends('backend.layouts.admin')

@section('title', '| Dashboard')

@section('stylesheets')
<style type="text/css">
  .dashboard-section{
      margin-bottom: 0px;
  }
</style>
{!! Charts::styles() !!}
@endsection

@section('content')
    <!-- MAIN CONTENT -->
        <h1 class="sr-only">Dashboard</h1>
        <!-- WEBSITE ANALYTICS -->
        <div class="dashboard-section">
          <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-pie-chart"></i> Website Analytics</h2>
            <a href="#" class="right hidden">View Full Analytics Reports</a>
          </div>
          <div class="panel-content">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="number-chart">
                  <div class="mini-stat">
                    <p class="text-muted"><i class="fa fa-users"></i> </p>
                  </div>
                  <div class="number"><span>{{ $totalUsers }}</span> <span>USERS</span></div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="number-chart">
                  <div class="mini-stat">
                    <p class="text-muted"><i class="fa fa-vcard"></i> </p>
                  </div>
                  <div class="number"><span>{{ $totalMembers }} </span>
                    <span>
                    @if($totalMembers == 1 || $totalMembers == 0)
                      Member
                    @else 
                      Members
                    @endif
                  </span></div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="number-chart">
                  <div class="mini-stat">
                    <p class="text-muted"><i class="fa fa-history"></i></p>
                  </div>
                  <div class="number"><span>{{ $totalActivities }}</span> <span>ACTIVITIES</span></div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="number-chart">
                  <div class="mini-stat">
                    <p class="text-muted"><i class="fa fa-envelope"></i></p>
                  </div>
                  <div class="number"><span>{{$totalContactMessages}}</span> 
                    <span>
                    @if($totalContactMessages == 1 || $totalContactMessages == 0)
                      Contact Message
                    @else 
                      Contact Messages
                    @endif
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                {!! $chart->html() !!}
            </div>
            <div class="col-md-6">
                {!! $chart2->html() !!}
            </div>
          </div>
        </div>
        <!-- END WEBSITE ANALYTICS -->
        <!-- SALES SUMMARY -->
        <div class="dashboard-section">
          <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-shopping-basket"></i> Programs</h2>
            <a href="{{route('activities.index')}}" class="right">View all activities</a>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="panel-content">
                <h3 class="heading"><i class="fa fa-square"></i> News & Events</h3>
                <ul class="list-unstyled list-justify large-number">
                  <li class="clearfix">News <span>{{$totalNews}}</span></li>
                  <li class="clearfix">Events <span>{{$totalEvents}}</span></li>
                  <li class="clearfix">Activities <span>{{$totalActivities}}</span></li>

                </ul>
              </div>
            </div>
            <div class="col-md-9">
              <div class="panel-content">
                <h3 class="heading"><i class="fa fa-square"></i> Latest Activities</h3>
              
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Pic</th>
                          <th>Title</th>
                          <th>District</th>
                          <th>Program</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($activities as $activity)
                        <tr>
                          <td><img class="activity-image" src="{{ asset('images/activities/'. $activity->file_name)}}" style="width: 20px; height: 20px;"></td>
                          <td>{{ $activity->title }}</td>
                          <td>{{ $activity->user->district }}</td>
                          <td><span class="text-info">{{ $activity->program->title }}</span></td>
                          <td><span class="text-success">{{ substr(strip_tags($activity->description), 0, 50) }}</span></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                 
              </div>
            </div>
          </div>
    
        <div class="dashboard-section">
          <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-users"></i> Users</h2>
            <a href="{{route('users.index')}}" class="right">View all users</a>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="panel-content">
                <h3 class="heading"><i class="fa fa-square"></i> Recent registerd users</h3>
                <div class="table-responsive">
                  <table class="table table-striped no-margin">
                    <thead>
                      <tr>
                        <th>Pic</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>Role</th>
                        <th>Date &amp; Time</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td><img src="{{ asset('images/users/'. $user->profile_image) }}" class="img-circle profile-image" alt="Avatar" style="width: 20px; height: 20px;"></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->district}}</td>
                          <td>
                            {{$user->roles->count() == 0 ? 'No roles yet' : ''}}
                            @foreach ($user->roles as $role)
                              <label> {{$role->display_name}}</label> 
                            @endforeach
                          </td>
                          <td>{{$user->created_at->toFormattedDateString()}}</td>
                          <td>
                            @if($user->profile->status == 'Active' )
                            <label class="label label-success">
                            @elseif($user->profile->status == 'Desactive')
                              <label class="label label-danger">
                            @elseif($user->profile->status == 'Pending')
                              <label class="label label-warning">
                            @endif
                            {{ $user->profile->status}} 
                            </label>
                          </td>
                        </tr>
                      @endforeach                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel-content">
                {!! $chart3->html() !!}
              </div>
            </div>
          </div>
        </div>
      </label>
        <!-- END SALES SUMMARY -->
     

        <!-- SOCIAL -->
        <div class="dashboard-section no-margin">
          <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-user-circle"></i> Social <span class="section-subtitle">(7 days report)</span></h2>
            <a href="#" class="right">View Social Reports</a>
          </div>
          <div class="panel-content">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <p class="metric-inline"><i class="fa fa-facebook"></i> 636 <span>LIKES</span></p>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="metric-inline"><i class="fa fa-instagram"></i> 528 <span>FOLLOWERS</span></p>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="metric-inline"><i class="fa fa-envelope-o"></i> {{$totalSubscribers}} <span>SUBSCRIBERS</span></p>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="metric-inline"><i class="fa fa-twitter"></i> 201 <span>Followers</span></p>
              </div>
            </div>
          </div>
        </div>
      <!-- END SOCIAL -->
    <!-- END MAIN CONTENT -->
    <div class="clearfix"></div>
@endsection


@section('scripts')
  <script src="/js/chart/Chart.min.js" charset="utf-8"></script>
  <script src="/js/chart/highcharts.js" charset="utf-8"></script>
  <script src="/js/chart/fusioncharts.js" charset="utf-8"></script>
  <script src="/js/chart/echarts-en.min.js" charset="utf-8"></script>
  <script src="/js/chart/c3.min.js" charset="utf-8"></script>
  <script src="/js/chart/d3.min.js" charset="utf-8"></script>
  <script src="/js/chart/raphael.min.js" charset="utf-8"></script>
  <script src="/js/chart/morris.min.js" charset="utf-8"></script>
  {!! $chart->script()  !!}
  {!! $chart2->script() !!}
  {!! $chart3->script() !!}
  {!! $chart4->script() !!}
@endsection

