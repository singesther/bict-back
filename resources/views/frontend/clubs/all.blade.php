@extends('frontend.layouts.page')

@section('title', '| Youth Clubs')

@section('content')
<!-- co-ntact -->
<div class="single-page news-page">
     <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Youth Clubs</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="news-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @foreach ($clubs as $club)
                    <div class="news-content">
                        <a href="{{ route('clubs.single', $club->slug) }}"><img src="{{ asset('images/clubs/'. $club->thumbnail)}}" alt=""></a>

                        <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                            <div class="header-elements">
                                <div class="clubed-date">{{ date('M j, Y', strtotime($club->created_at)) }}</div>

                                <h2 class="entry-title"><a href="#">{{ $club->title }}</a></h2>

                                <div class="club-metas d-flex flex-wrap align-items-center">
                                    <span class="cat-links">in <a href="#">{{ $club->category->name }}</a></span>
                                    <span class="club-author">by <a href="#">{{ $club->user['name'] }}</a></span>
                                    <span class="club-comments"><a href="#">{{ $club->comments()->count() }} Comments</a></span>
                                </div>
                            </div>

                            
                        </header>

                        <div class="entry-content">
                            <p>{{ substr(strip_tags($club->body), 0, 200) }}
                            {{ strlen(strip_tags($club->body)) > 200 ? "..." : "" }}</p>
                        </div>

                        <footer class="entry-footer">
                            <a href="{{ route('clubs.single', $club->slug) }}" class="btn gradient-bg">Read more</a>
                        </footer>
                    </div>
                @endforeach


                    <!-- <ul class="pagination d-flex flex-wrap align-items-center p-0">
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                    </ul> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                {!! $clubs->links() !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="sidebar">
                        <div class="search-widget">
                            <form class="flex flex-wrap align-items-center">
                                <input type="search" placeholder="Search...">
                                <button type="submit" class="flex justify-content-center align-items-center">GO</button>
                            </form><!-- .flex -->
                        </div><!-- .search-widget -->

                        <div class="popular-clubs">
                            <h2>Popular Posts</h2>

                            <ul class="p-0">
                                @foreach ($clubs as $club)
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="{{ asset('images/clubs/'. $club->thumbnail)}}" alt="" style="width: 72px; height:72px;"></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">{{ $club->title }}</a></h3>

                                        <div class="clubed-date">{{ date('M j, Y', strtotime($club->created_at)) }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- .cat-links -->

                        <div class="upcoming-events">
                            <h2>Projects & Events</h2>
                            <ul class="p-0">
                                @foreach ($projects as $project)
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="{{ route('projects.single', $project->slug) }}"><img src="{{ asset('images/projects/'. $project->file)}}" a{{ route('clubs.single', $club->slug) }}lt="" style="width: 106px; height:106px;"></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="{{route('projects.single', $project->slug) }}">{{ $project->title }}</a></h3>

                                        <div class="club-metas d-flex flex-wrap align-items-center">
                                            <span class="clubed-date"><a href="#">{{ date('M j, Y', strtotime($project->created_at)) }}</a></span>
                                            <span class="event-location"><a href="#">{{ $project->location }}</a></span>
                                        </div>

                                        <p>{{ substr(strip_tags($project->description), 0, 50) }}
                                        {{ strlen(strip_tags($project->description)) > 50 ? "" : "" }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- .cat-links -->

                    </div><!-- .sidebar -->
                </div><!-- .col -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript"></script>


@endsection