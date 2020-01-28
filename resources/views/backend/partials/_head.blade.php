  <title>Rwanda Youth Volunteer @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/linearicons/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/metisMenu/metisMenu.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/chartist/css/chartist.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min.css') }}">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('backend/img/favicon.png">
@yield('stylesheets')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
.img-circle{
  width: 150px;
  height: 150px;
}

.row.modify-row-margin {
    margin-right: 10px;
    margin-left: 10px;
}
.user-photo{
  width: 150px;
  height: 150px;
  border-radius: 50%;
  max-width: 100%;
}

.btn-spacing {
    margin: 10px 0px;
}


.btn-h1-spacing,
.form-spacing-top {
  margin-top: 10px;
}

.row.modify-row-margin {
  margin-right: 10px;
  margin-left: 10px;
}

.dashboard-float1, .dashboard-float2{
  display: inline-block;
  margin-bottom: 20px;
  padding-right: 20px;
  vertical-align: top;
}
.dashboard-float2{
  /*float: right;*/
}

.dropdown-menu {
  min-width: 100px;
}

.dropdown-menu li button, .dropdown-menu li a{
  width:100%;
  color: #000;
  text-align: left;
}

.btn-group .dropdown-menu .divider {
    background-color: #ffffff;
}

.btn-group .dropdown-menu{
    padding: 0px 0;
    left: -50px;
    border-color: rgba(0, 0, 0, 0.3);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}
.btn-group .dropdown-menu li{
    padding: 3px;
}

.btn-info{
    background-color: #5094b9;
    border-color: #5094b9;
    color: #ffffff;
}

</style>
