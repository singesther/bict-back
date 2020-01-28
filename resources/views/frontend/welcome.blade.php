@extends('frontend.layouts.main')

<?php $titleTag = trans('frontend.welcome') ?>
@section('title', "| $titleTag")

@section('styles')
<link rel="stylesheet" href="/frontend/assets/css/magnific-popup.css">
<style type="text/css">
.content-body{
    background-color: white;
    margin-top: 0px;
}  

.client-logo img{
    width: 86px;
    height: 100px;
}

#myVideo {
    right: 0;
    bottom: 0;
    min-height: 80%;
    width: 100%;
    min-width: 100%;
    min-height: 100%;
    position: absolute;
}

#gallery .carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* The controlsy */
#gallery .carousel-control {
    /*left: -12px;*/
    height: 40px;
    width: 40px;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    margin-top: 90px;
}
#gallery .carousel-control.right {
    right: -12px;
}
/* The indicators */
#gallery .carousel-indicators {
    right: 50%;
    top: auto;
    bottom: -10px;
    margin-right: -19px;
}
/* The colour of the indicators */
#gallery .carousel-indicators li {
    background: #cecece;
}
#gallery .carousel-indicators .active {
    background: #428bca;
}

#frmContactus input:not([type=radio]):not([type=checkbox]):not([type=range]),
textarea {
  border: 1px solid #fff6;
}

.installation-step{
  width: 100%;
}
.installation-step .img-act{
  width: 30%;
}
.installation-step .img-act img{
  width: 100%;
}

.installation-step .cont-act{
  width: 60%;
  padding-left: 20px
}

.installation-step .img-act,
.installation-step .cont-act{
  display: inline-block;
  vertical-align: top;
  margin: 10px 0px;
}

.thumbnail > img{
    min-height: 232px;
}

.btn-card-holder{
    color: #fff !important;background: #083545;
    padding: 10px;
    border-radius: 20px;
    width: 15%;
    margin: 0 auto;
    margin-top: 10px;
}

@media all and (max-width: 480px){
   .btn-card-holder{
     width: 40%;
    } 
}

</style>
@endsection

@section('content')
 <!-- Banner Area -->
    <div id="banner" class="banner">
        <div class="banner-item banner-1 steller-parallax" data-stellar-background-ratio="0.5">
            <video autoplay muted loop id="myVideo">
                <source src="/videos/RYVCPC VIDEO FINAL.mp4" type="video/MP4"/>
            </video>
            <div class="banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="banner-text-content">
                                <?php $ryvcp = App\About::Where('slug','=','RYVCP')->first() ?>
                            <h2 class="section-title"> </h2>
                                <h1 class="banner-title">{{ $ryvcp->title }}</h1>
                                <p class="banner-text">{!! $ryvcp->content !!}</p>
                                <div class="button-group">
                                    <a class="btn" onclick="document.getElementById('register-link').style.display='block'">Become a Member</a>
<!-- login modal -->
<!-- end of -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 hidden-sm hidden-xs">
                            <div class="mock right-style">
                                <!--<img class="back-mock wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s" src="/images/logo.jpg" alt="mock back">-->
                                <!--<img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="/images/logo.jpg" alt="mock front">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- who we are -->
        <div class="section section-padding video-section offwhite-bg" id="who_we_are"
        style="padding-bottom: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 sm-bottom-40">
                        <div class="section-header style-2">
                            <?php $who_we_are = App\About::Where('slug','=','who-we-are')->first() ?>
                            <h2 class="section-title">{{ $who_we_are->title }} </h2>
                        </div>
                        <p>{!! $who_we_are->content !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        {!! $who_we_are->youtube_video !!}
                    </div>
                </div>
            </div>
            <!-- Intro Section -->
            <div class="section section-padding">
            <div class="container">
                <div class="intros" id="mission_vision">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0s">
                                <div class="intro-icon">
                                    <span class="icon-tools-2"></span>
                                </div>
                                <?php $mission = App\About::Where('slug','=','mission')->first() ?>
                                <h4 class="intro-title">{{ $mission->title }}</h4>
                                <p class="intro-content">{!! $mission->content !!}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <div class="intro-icon">
                                    <span class="icon-layers"></span>
                                </div>
                                <?php $vision = App\About::Where('slug','=','vision')->first() ?>
                                <h4 class="intro-title">{{ $vision->title }}</h4>
                                <p class="intro-content">{!! $vision->content !!}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                                <div class="intro-icon">
                                    <span class="icon-speedometer"></span>
                                </div>
                                <?php $values = App\About::Where('slug','=','values')->first() ?>
                                <h4 class="intro-title">{{ $values->title }}</h4>
                                <p class="intro-content">{!! $values->content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Intro section end -->  
        <!-- who we are end -->
        <!-- Testimonials -->
        <div class="container-fluid" id="testimonial_section">
            <div class="text-center">
                <h2>Testimonial</h2>
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        @foreach($testimonials as $testimonial)
                        <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active': "" }}"></li>
                        @endforeach
                    </ol>   
                    <!-- Carousel items -->
                    <div class="carousel-inner" >
                        @foreach($testimonials as $testimonial)
                        <div class="item {{ $loop->first ? 'active': "" }}" id="inner-content">
                            <div class="testimonial ">
                                <div class="commenter-thumb ">
                                    <img src="{{ asset('images/testimonials/' .$testimonial->file_name) }}" alt="Client Avatar" id="avatar">
                                </div>
                                <blockquote class="container">{{$testimonial->description}}</blockquote>
                                <div class="client-info ">
                                    <h5 class="client-name ">{{$testimonial->creator_name}}</h5>
                                    <p class="client-profession ">{{$testimonial->creator_postion}}
                                        @if($testimonial->company != "")
                                        , {{$testimonial->company}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class=""></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class=""></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Testimonials End --> 
        <!-- what we do -->
        <div id="what_we_do" class="section section-padding" >
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                        <div class="section-header text-center">
                            <h3 class="section-title">What We Do</h3>
                            <p class="section-subtext">To know more about what we do , take a look at the content below .</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="support-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($programs as $program)
                            <li role="presentation" data-tab-to="{{ $loop->index }}" class="{{ $loop->first ? 'active': "" }}"><a href="#tab-id-{{$program->id}}" aria-controls="tab-id-{{$program->id}}" role="tab" data-toggle="tab"><span class="icon-clipboard"></span>{{ $program->title }}</a></li>
                            @endforeach
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($programs as $program)
                            <div role="tabpanel" class="tab-pane fade in {{ $loop->first ? 'active': "" }}" id="tab-id-{{$program->id}}">
                                <div class="pane-content">
                                    <div class="installation-steps">
                                        <?php $bodyActivities= App\Activity::where('program_id', $program->id)->where('live','1')->limit(2)->get() ?>
                                        @foreach($bodyActivities as $activity)
                                        <div class="installation-step">
                                            <div class="img-act">
                                                <img src="{{ asset('images/activities/' .$activity->file_name)}}">
                                            </div>
                                            <div class="cont-act">
                                                <p class="step-title">{{$activity->title}}</p>
                                                <div class="step-content">  {{ substr(strip_tags($activity->description), 0, 130) }}
                                                {{ strlen(strip_tags($activity->description)) > 130 ? "..." : "" }} <a href="{{ route('activities.single', $activity->slug) }}">Read more</a></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="pull-right" style="color: #fff !important;background: #083545;padding: 10px;border-radius: 20px;">  <a href="{{route('programs.single', $program->slug)}}" style="color: #fff;">View all activities</a> </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- what we do End -->
    <div class="main-wrap">
        <!-- media start -->
        <div id="media" class="section section-padding offwhite-bg">
            <div class="section-header text-center">
                <h3 class="section-title">Media</h3>
                <p class="section-subtext">To know more about what we do , take a look at the content below .</p>
            </div>
            <div id="news-containe" class="col-sm-12">
                <div id="newsroom">
                    <h4 align="center">News Room</h4>  
                    <!-- news room -->
                    @foreach($posts as $post)
                        <div class="col-md-4 col-sm-6 col-xs-12 news-each" id="responsive">
                          <div class="gallery">
                            <a href="{{ route('news.single', $post->slug) }}" >
                              <img src="{{ asset('images/news/'. $post->thumbnail) }}" >
                            </a>  
                             <h5> 
                                <a href="{{ route('news.single', $post->slug) }}" style="color: #205589;">{{$post->title}}</a></h5>
                            <small>&nbsp; {{ date('M j, Y', strtotime($post->created_at)) }}  | &nbsp;   <i class="fa fa-comment"></i> {{ $post->comments()->count() }} </small>
                          </div>
                        </div>
                     @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                {!! $posts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>           
                <div id="twitter_feeds" style="max-height: 200px;">     
                    <a class="twitter-timeline" data-width="400" data-height="830" data-link-color="#2B7BB9" href="https://twitter.com/RwandaVolunteer?ref_src=twsrc%5Etfw">Tweets by RwandaVolunteer</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>  
                </div>
            </div>
            <!-- news room end  -->
            <hr>

            <!-- events room -->
            <div id="news-containe">
                <div id="events">
                <h4 align="center">Events Room</h4>  
                <div class="slideshow-container">
                    @foreach($events as $event)
                    <div class="mySlides fade">
                      <div class="numbertext">1 / 3</div>
                        <div class="card">
                          <div class="cont-1">
                           <img src="{{ asset('images/events/'.$event->file_name) }}" alt="Avatar" >
                         </div>
                         <div class="cont-2">
                          <h3><b>{{ $event->title }}</b></h3> 
                          <p><b>Location</b>: {{$event->location}}</p> 
                          <p><b>Date</b>: {{$event->date}}</p> 
                          <p><b>Hosted by</b>: {{$event->hosted_by}}</p> 
                          <p><b>Description</b></p>
                          <p>{!! $event->description !!}</p>
                         </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>

                <div style="text-align:center">
                    @foreach($events as $event)
                        <span class="dot"></span> 
                    @endforeach
                </div>

                </div>
                <div id="twitter_feeds" style="overflow: scroll;">
                    <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-page" data-href="https://www.facebook.com/Rwanda-Youth-Volunteers-in-Community-Policing-551811041688240/?__tn__=kC-R&amp;amp;eid=ARD4dctevgEdxjWOcskZVAkWqBm35RPeEx4Jim_Mg2HkRCO1rCEAuomu84KKAu_bkfg-hKsyFquWz9zM&amp;amp;hc_ref=ARSzQPdpf_jp5BVAbyIBeUGwM20P2ffEEjoBXTEo_0Xor_geqWIBq4ed2iaA4B2thtA&amp;amp;fref=nf&amp;amp;__xts__[0]=68.ARAeRi9o0Jr_-VNEqWK5LJp6X5AXxtQuYTmkHfOZPswtnlCMrvd5iUFVR7DEDKEU8-AGDEZve2q05yPsjc-Pay7-tfQSjXi_9DibsXoygLgZKJ6ZWCXyTJpq-y9vjr57Z-r5bsoNUlAbaL5xo131BNXiKljHPyhNcVf1xFeLhODHGeu00drbubBjdvFVDI5w9Phnh3lLOVfcdjEduLZb8ZhNlzv2gMkFzkePJPgO1GxsYJsrn1HUGjyZoLEU29tMXstBYdM_yHY4bCk2bT7AmTUJDZ2heT8MmH-SxLD4LcmVP6a2nrsTvtibpD3EAHMIpZc" data-tabs="timeline" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Rwanda-Youth-Volunteers-in-Community-Policing-551811041688240/?__tn__=kC-R&amp;amp;eid=ARD4dctevgEdxjWOcskZVAkWqBm35RPeEx4Jim_Mg2HkRCO1rCEAuomu84KKAu_bkfg-hKsyFquWz9zM&amp;amp;hc_ref=ARSzQPdpf_jp5BVAbyIBeUGwM20P2ffEEjoBXTEo_0Xor_geqWIBq4ed2iaA4B2thtA&amp;amp;fref=nf&amp;amp;__xts__[0]=68.ARAeRi9o0Jr_-VNEqWK5LJp6X5AXxtQuYTmkHfOZPswtnlCMrvd5iUFVR7DEDKEU8-AGDEZve2q05yPsjc-Pay7-tfQSjXi_9DibsXoygLgZKJ6ZWCXyTJpq-y9vjr57Z-r5bsoNUlAbaL5xo131BNXiKljHPyhNcVf1xFeLhODHGeu00drbubBjdvFVDI5w9Phnh3lLOVfcdjEduLZb8ZhNlzv2gMkFzkePJPgO1GxsYJsrn1HUGjyZoLEU29tMXstBYdM_yHY4bCk2bT7AmTUJDZ2heT8MmH-SxLD4LcmVP6a2nrsTvtibpD3EAHMIpZc" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Rwanda-Youth-Volunteers-in-Community-Policing-551811041688240/?__tn__=kC-R&amp;amp;eid=ARD4dctevgEdxjWOcskZVAkWqBm35RPeEx4Jim_Mg2HkRCO1rCEAuomu84KKAu_bkfg-hKsyFquWz9zM&amp;amp;hc_ref=ARSzQPdpf_jp5BVAbyIBeUGwM20P2ffEEjoBXTEo_0Xor_geqWIBq4ed2iaA4B2thtA&amp;amp;fref=nf&amp;amp;__xts__[0]=68.ARAeRi9o0Jr_-VNEqWK5LJp6X5AXxtQuYTmkHfOZPswtnlCMrvd5iUFVR7DEDKEU8-AGDEZve2q05yPsjc-Pay7-tfQSjXi_9DibsXoygLgZKJ6ZWCXyTJpq-y9vjr57Z-r5bsoNUlAbaL5xo131BNXiKljHPyhNcVf1xFeLhODHGeu00drbubBjdvFVDI5w9Phnh3lLOVfcdjEduLZb8ZhNlzv2gMkFzkePJPgO1GxsYJsrn1HUGjyZoLEU29tMXstBYdM_yHY4bCk2bT7AmTUJDZ2heT8MmH-SxLD4LcmVP6a2nrsTvtibpD3EAHMIpZc">Rwanda Youth Volunteers in Community Policing</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
          <!-- events room end -->
        <hr>

    <!-- gallery  -->
    <div id="news-containe">
        <div id="gallery">
        <h4 align="center">Gallery</h4>  
            <!-- start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="Carousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner popup-gallery">
                                
                                <div class="item active">
                                    <div class="row">
                                        @foreach($gallery as $firstgallery)
                                          <div class="col-md-3"><a href="{{ asset('images/gallery/' .$firstgallery->file_name) }}" class="thumbnail"><img src="{{ asset('images/gallery/' .$firstgallery->file_name) }}" alt="{{$firstgallery->title}}" style="max-width:100%;"></a></div>
                                        @endforeach
                                    </div><!--.row-->
                                </div><!--.item-->
                                 
                                <div class="item">
                                    <div class="row">
                                        @foreach(App\Gallery::where('is_published','1')->limit(4)->offset(4)->get() as $firstgallery)
                                          <div class="col-md-3"><a href="{{ asset('images/gallery/' .$firstgallery->file_name) }}" class="thumbnail"><img src="{{ asset('images/gallery/' .$firstgallery->file_name) }}" alt="{{$firstgallery->title}}" style="max-width:100%;"></a></div>
                                        @endforeach
                                    </div><!--.row-->
                                </div><!--.item-->
                                 
                                <div class="item">
                                    <div class="row">
                                        @foreach(App\Gallery::where('is_published','1')->limit(4)->offset(8)->get() as $firstgallery)
                                          <div class="col-md-3">
                                            <a href="{{ asset('images/gallery/' .$firstgallery->file_name) }}" class="thumbnail"><img src="{{ asset('images/gallery/' .$firstgallery->file_name) }}" alt="{{$firstgallery->title}}" style="max-width:100%;"></a></div>
                                        @endforeach
                                    </div><!--.row-->
                                </div><!--.item-->
                             
                            </div><!--.carousel-inner-->
                              <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                              <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                        </div><!--.Carousel-->
                    </div>
                </div>
            </div>
        </div><!--.container-->                 <!-- end  -->
    </div>
    <!-- end of gallery -->

    <!-- our teem start -->
    <div id="our_team" class="section section-padding offwhite-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12">
                    <div class="section-header text-center">
                        <h3 class="section-title">Our Team</h3>
                        <p class="section-subtext">Down there you can see our team</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="card-holder">
                    @foreach($team as $team)
                    <div class="col-md-3">
                        <div id="card" class="card1">
                            <img src="{{ asset('images/team/'.$team->image) }}" id="teemimg">
                            <center>
                            <h5><b>{{$team->name}}</b></h5>
                            <h6><b>{{$team->position}}</b></h6>
                            <p id="teemtext" ></p>
                            <button id="knowmorebtn" class="hidden">Know more</button></center>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center btn-card-holder">  <a href="{{route('team.all')}}" style="color: #fff;">View All Team</a> 
                                    </div>
            </div>
        </div>
    </div>
    <!-- our teem End -->
    <!-- Features In -->
    <div class="section section-padding" id="our_partners">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12">
                    <div class="section-header text-center style-2">
                        <h3 class="section-title">Our Partners</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(App\Partner::all() as $partner)
                <a class="client-logo" href="#"><img src="{{ asset('images/partners/'. $partner->logo) }}" alt="Client Logo"></a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Features In End -->

    <!-- Contact area -->
    <div id="contact" class="overlay-black">
        <div class="text-white" style="padding: 30px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="map" class="">
                               <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="560" id="gmap_canvas" src="https://maps.google.com/maps?q=Gasabo%20District%20Office&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pure black</a></div><style>.mapouter{text-align:right;height:560px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:560px;width:100%;}</style></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <div class="section-header style-2">
                            <h3 class="section-title">Contact us</h3>
                            <p class="section-subtext">If you have any kind of query feel free to contact with us</p>
                        </div>
                        <form id="frmContactus" name="frmContactus" class="form-horizontal">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <p class="errorName alert alert-danger hidden"></p>
                            <p>
                                <input id="name" type="text" name="name" placeholder="Name" required>
                            </p>
                            <p>
                                <label class="errorEmail alert alert-danger hidden"></label>
                                <input id="email" type="email" name="email" placeholder="Email" required>
                            </p>
                            <p>
                                <label class="errorTel alert alert-danger hidden"></label>
                                <input type="tel" name="tel" id="tel" placeholder="Phone Number">
                            </p>
                            <p>
                                <label class="errorSubject alert alert-danger hidden"></label>
                                <input id="subject" type="text" name="subject" placeholder="Subject" required>
                            </p>
                            <p>
                                <label class="errorMessage alert alert-danger hidden"></label>
                                <textarea id="message" name="message" placeholder="Your message" rows="5" style="background: transparent;" required></textarea>
                            </p>
                           
                            <button type="button" id="btn-send" class="btn"><i class="fa fa-paper-plane"></i> Submit</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Contact area end -->
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="/frontend/assets/js/jquery.magnific-popup.js"></script>
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
           titleSrc: 'title'
        }
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 5000
    })
  });    
</script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#btn-send").click(function() {
        $.ajax({
            type: "POST", //for creating new resource
            url: '{{URL::to('/contacts')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                tel: $('#tel').val(),
                subject: $('#subject').val(),
                message: $('#message').val(),
            },
            success: function(data) {
                if ((data.errors)){
                    $('.errorName').removeClass('hidden');
                    $('.errorName').text(data.errors.name);
                    $('.errorTel').removeClass('hidden');
                    $('.errorTel').text(data.errors.tel);
                    $('.errorEmail').removeClass('hidden');
                    $('.errorEmail').text(data.errors.email);
                    $('.errorSubject').removeClass('hidden');
                    $('.errorSubject').text(data.errors.suject);
                    $('.errorMessage').removeClass('hidden');
                    $('.errorMessage').text(data.errors.message);
                    console.log(data);
                    toastr.warning('Sorry, we failed to send your message, something\'s wrong! Check the errors above your inputs', 'Warning Alert', { timeOut: 5000 });
                }
                else {
                    $('.errorName').addClass('hidden');
                    $('.errorTel').addClass('hidden');
                    $('.errorEmail').addClass('hidden');
                    $('.errorSubject').addClass('hidden');
                    $('.errorMessage').addClass('hidden');
                    toastr.success('Congrates, your message is being sent', 'Success Alert', { timeOut: 5000 });
                    $('#frmContactus').trigger("reset");
                }
            },
            error: function(data) {
                console.log('Error:', data);
                alert(data.responseText);
            }
        });
    });
});

</script>
@endsection