@extends('frontend.layouts.page')

@section('title', '| Stories')

@section('content')
<!-- co-ntact -->
<div class="single-page news-page">
     <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Stories</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="news-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @foreach ($stories as $story)
                    <div class="news-content">
                        <a href="{{ route('stories.single', $story->slug) }}"><img src="{{ asset('images/stories/'. $story->file)}}" alt=""></a>

                        <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                            <div class="header-elements">
                                <div class="storyed-date">{{ date('M j, Y', strtotime($story->created_at)) }}</div>

                                <h2 class="entry-title"><a href="#">{{ $story->title }}</a></h2>
                            </div>

                            
                        </header>

                        <div class="entry-content">
                            <p>{{ substr(strip_tags($story->description), 0, 200) }}
                            {{ strlen(strip_tags($story->description)) > 200 ? "..." : "" }}</p>
                        </div>

                        <footer class="entry-footer">
                            <a href="{{ route('stories.single', $story->slug) }}" class="btn gradient-bg">@lang('frontend.readmore')</a>
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
                                {!! $stories->links() !!}
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

                        <div class="popular-stories">
                            <h2>Popular Posts</h2>

                            <ul class="p-0">
                                @foreach ($stories as $story)
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="{{ asset('images/stories/'. $story->file)}}" alt="" style="width: 72px; height:72px;"></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">{{ $story->title }}</a></h3>

                                        <div class="storyed-date">{{ date('M j, Y', strtotime($story->created_at)) }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- .cat-links -->

                        <div class="upcoming-events">
                            <h2>Stories</h2>
                            <ul class="p-0">
                                @foreach ($stories as $story)
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="{{ route('stories.single', $story->slug) }}"><img src="{{ asset('images/stories/'. $story->file)}}" a{{ route('stories.single', $story->slug) }}lt="" style="width: 106px; height:106px;"></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="{{route('stories.single', $story->slug) }}">{{ $story->title }}</a></h3>

                                        <div class="story-metas d-flex flex-wrap align-items-center">
                                            <span class="storyed-date"><a href="#">{{ date('M j, Y', strtotime($story->created_at)) }}</a></span>
                                            <span class="event-location"><a href="#">{{ $story->location }}</a></span>
                                        </div>

                                        <p>{{ substr(strip_tags($story->description), 0, 50) }}
                                        {{ strlen(strip_tags($story->description)) > 50 ? "" : "" }}</p>
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