@extends('frontend.layouts.main')

@section('title', "| FAQs")

@section('styles')

<style>
  .faqHeader {
      font-size: 27px;
      margin: 20px;
  }

/*Accordion*/
.panel-title>a, .panel-title>a:active{
  display:block;
  color:#555;
  font-size:16px;
  text-decoration:none;
}
.panel-heading a:before {
  font-family: 'Glyphicons Halflings';
  content: "\e114";
  float: right;
  transition: all 0.5s;
  font-size: 15px;
}

.panel-heading.active a:before {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  transform: rotate(180deg);
} 
.panel-group {
  margin-top: 40px;
}
.panel {
 /* box-shadow: 0 2px 6px rgb(247, 139, 32);
  box-shadow: 0 2px 6px rgb(251, 189, 25);
  box-shadow: 0 2px 6px rgba(251, 189, 25, 0.47);*/
  /*box-shadow: 0 2px 6px rgb(173, 173, 173);*/
  box-shadow: 0 2px 3px rgb(173, 173, 173);
  /*box-shadow: none;*/
}

  #footer{
    margin-top: 200px;
  }
  .faqs h1 a:hover{
    text-decoration: none;
    border-bottom: 2px solid #4dadb4;
  }
</style>

@endsection

@section('content')
<div class="container faqs" style="margin:100px auto;">
  <h3 class="text-center"> Frequent Asked Questions</h3>
  <div class="row form-content" id="step-3" >
    <div class="col-md-10 col-md-offset-1">
      <?php $no=1; ?>
      @foreach($faqs as $faq)
      <div class="panel-group" id="accordion">
        <div class="item active">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}"
                      style="font-size: 18px; color: rgb(51, 51, 51);">
                  {{$no++}}.&nbsp;{{$faq->question}}</a>
                </h3>
              </div>
              <div id="collapse{{$faq->id}}" class="panel-collapse collapse">
              <div class="panel-body utilities">
                {!! $faq->answer !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>  
</div>
@endsection


@section('scripts')
<script>

//Making the panel active on click of panel heading (3rd step)
$(function () {
  $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
});

</script>
@endsection