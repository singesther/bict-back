@extends('frontend.layouts.main')

<?php $titleTag = trans('frontend.welcome') ?>
@section('title', "| $titleTag")

@section('styles')
<link rel="stylesheet" href="/frontend/assets/css/magnific-popup.css">
<style type="text/css">
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

input:not([type="radio"]):not([type="checkbox"]):not([type="range"]), textarea {
    height: 100%;
}

.activities .btn {
    margin: 0px;
}
.activities .section-title {
    font-size: 3.8rem;
}

input:not([type="radio"]):not([type="checkbox"]):not([type="range"]), textarea {
    font-size: 1.4rem;
    padding: 6px 10px;
    background-color: transparent;
    border: 1px solid #08354566;
}

.program-title {
    color: #929191;
    font-size: 12px;
}

.textbox-clr{
  cursor:pointer;
  background:#fff;
  width:30px; 
  height: 40px;
  /*height: 34px;*/
  float:left;
  border:none;
  margin-top:0px; 
  text-align:center;
  color: black;
}

.textbox-clr:focus,
.textbox-clr:hover  {
    background-color: #fff !important;
    border-color: none;
}


</style>
@endsection

@section('content')
<!-- what we do -->
<div id="what_we_do" class="section section-padding activities" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="section-header  pull-left">
                    <h4 class="">All 
                      {{ $program->title }} Activities</h4>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 search-widget">
                <form class="pull-right" style="width: 70%;">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search activity"
                         onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu" style="padding: 12px;">
                        <span class="input-group-btn">
                            <button type="submit" class="btn" style="border-radius: 0px;padding: 0px 20px;">GO</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="support-tabs">
                <!-- Tab panes -->
                <div class="tab-content" id="activities_list">
                    @foreach($program->activities as $activity)
                    <div class="installation-step">
                        <div class="img-act">
                            <img src="{{ asset('images/activities/' .$activity->file_name)}}">
                        </div>
                        <div class="cont-act">
                            <p class="step-title">{{$activity->title}}</p>
                            <span class="program-title"><span>
                            <span class="program-title"><label>Location: </label> {{ $activity->user->district }}</span>
                            <div class="step-content">
                              {{ substr(strip_tags($activity->description), 0, 130) }}
                              {{ strlen(strip_tags($activity->description)) > 130 ? "..." : "" }} 
                              <a href="{{ route('activities.single', $activity->slug) }}">Read more</a></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
               
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection


@section('scripts')
<script type="text/javascript">
    function lightbg_clr() {
  $('#qu').val("");
  $('#textbox-clr').text("");
  $("#qu").focus();
  $('#activities_list').load(document.URL +  ' #activities_list');
  return;
};
     
function fx(str)
{
  var s1 = document.getElementById("qu").value;
  if (str.length==0) {
    $('#textbox-clr').text("");
    $("#activities_list").html("");
  }
  if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  }
  else{// code for IE6, IE5
    var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange=function(){
    console.log(this.status);
    // console.log('Error:', this.responseText);
    // console.log('Error:', xmlhttp);
    // alert(xmlhttp.responseText);
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("activities_list").innerHTML=xmlhttp.responseText;
      $('#textbox-clr').text("X");
    }
  }
  
  xmlhttp.open("GET","/activity-search?n="+s1,true);
  xmlhttp.send();
}

</script>
@endsection