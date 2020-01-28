@yield('connection')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('frontend.partials._head')
        <style type="text/css">
        </style>
    </head>
    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!-->
    <body><!--<![endif]-->
        <header>
            @include('frontend.partials._header')
        </header>
        <div class="container articlesection">
            <div class="col-md-9 article" style="background-color: white;">
                <div class="container-fluid content-body" id="app">
                @yield('article')
                </div>
            </div>
            <div class="col-md-3 aside">
            </div>
        </div>
        <footer>
            @include('frontend.partials._footer')
        </footer>
            @yield('scripts')
            @include('frontend.partials._javascript')
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        
  </body>
</html>