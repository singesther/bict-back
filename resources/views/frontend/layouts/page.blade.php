@yield('connection')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('frontend.partials._head')
        @yield('styles')
    </head>
    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!-->
    <body><!--<![endif]-->
        <div id="app">
            @include('frontend.partials._header')
            <div class="content-body" style="background-color: white;">
                 @yield('content')
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                
            </div>
               
            <div class="footer">
                @include('frontend.partials._footer')
            </div>
        </div>
        @include('frontend.partials._javascript')
        @yield('scripts')
  </body>
</html>