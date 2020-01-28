@extends('frontend.layouts.main')

@section('title', '| Our Team')

@section('styles')
<link href="css/home.css" rel='stylesheet' type='text/css' />
<style type="text/css">

.ourteam{
  margin-bottom: 10px;
}
.team-img{
  width: 200px;
  height: 200px;
  border: 5px solid #fff;
  /*border-radius: 50%;*/
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}

.team-about{
  padding-top: 10px; 
}

.ourteam h3 {
    font-size: 2em;
    margin: 0.5em 0px 0.5em 0px;
    font-weight: 700;
    color: #000;
    text-align: center;
    font-family: MeriendaOne-Regular;
    padding-top: 20px;
}

.ourteam h4 {
    color: #000;
    background-color: #FFF;
    padding: 1em;
    padding: 0.4em 0 0.4em 0.4em;
    margin: 0;
    font-size: 1.5em;
    text-transform: uppercase;
    font-weight: 500;
    font-family: MeriendaOne-Regular;
}

.ourteam p{
  text-align: justify;
}

</style>
@endsection
@section('content')

<!-- team -->
<div class="ourteam">
  <div class="container">
    <h3>Our Team</h3>
      <br/>
    
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
      </div>


    <div class="clearfix"> </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection