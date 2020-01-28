<!-- Metas -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Rwanda Youth Volunteer Forum @yield('title')</title>
<!-- External CSS -->
<link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/frontend/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/frontend/assets/css/et-line.css">
<link rel="stylesheet" href="/frontend/assets/css/magnific-popup.css">
<link rel="stylesheet" href="/frontend/assets/css/animate.css">
<!-- <link rel="stylesheet" href="/frontend/assets/css/owl.carousel.css"> -->
<!-- <link rel="stylesheet" href="/frontend/assets/css/owl.transitions.css"> -->
<!-- <link rel="stylesheet" href="/frontend/assets/css/plyr.css"> -->
<!-- Custom CSS -->
<link rel="stylesheet" href="/frontend/css/style.css">
<link rel="stylesheet" href="/frontend/css/modals_styling.css">
<link rel="stylesheet" href="/frontend/css/mine.css">
<link rel="stylesheet" href="/frontend/css/responsive.css">
<link rel="stylesheet" href="/frontend/css/media.css">
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

<!-- Favicon -->
<link rel="icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

<style type="text/css">
  .imgcontainer {
    margin: 0;
  }
</style>

<!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    function lightbg_clr() {
        $('#qu').val("");
        $('#textbox-clr').text("");
        $('#search-layer').css({"width":"auto","height":"auto"});
        $('#livesearch').css({"display":"none"}); 
        $("#qu").focus();
    };
         
    function fx(str)
    {
      var s1 = document.getElementById("qu").value;
      if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        document.getElementById("search-layer").style.width="auto";
        document.getElementById("search-layer").style.height="auto";
        document.getElementById("livesearch").style.display="block";
        $('#textbox-clr').text("");
        return;
      }
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      }
      else{// code for IE6, IE5
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      
      xmlhttp.onreadystatechange=function(){
        console.log(this.status);
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
          document.getElementById("search-layer").style.width="100%";
          document.getElementById("search-layer").style.height="100%";
          document.getElementById("livesearch").style.display="block";
          $('#textbox-clr').text("X");
        }
      }
      
      xmlhttp.open("GET","/live-search?n="+s1,true);
      xmlhttp.send();
    }
</script>
<style type="text/css">	
.content-body{
   background-color: white;
   margin-top: 100px;
}	
#avatar{
    border-radius:50%;
    width:100px;
    height: 100px;
}
#inner-content{
    padding:50px 0px 50px 0px;
}
#testimonial_section .item{
  background:#083545; 
  color:white;
}
/*.carousel-indicators {
        bottom: 0px;
}*/
.dropbtn {
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;background-color: #083545;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color:#083545;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color:#083545;}

.disabled{
    pointer-events:none;
    opacity:0.7;
}

#contact .alert,
.subscription .alert,
.cont-login .alert {
    padding: 0px;
    margin-bottom: 0px;
}

#contact .alert-danger,  
.subscription .alert-danger,
.cont-login .alert-danger{
    color: #a94442;
    background-color: transparent;
    border-color: transparent;
}
.alert.alert-danger.register-alert{
  background-color: #f2dede;
  border-color: #ebccd1;
  padding: 0 20px;
}


ol, ul {
    margin: 0;
    padding: 0;
    list-style: outside none none;
}
</style>