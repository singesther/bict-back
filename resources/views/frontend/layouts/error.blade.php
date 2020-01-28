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
        <div class="container pagesection">
            <div id="app">
              @yield('content')
            </div>
        </div>
        <div class="container bodysection"></div>
        <footer>
            @include('frontend.partials._footer')
        </footer>
            @include('frontend.partials._javascript')
            @include('frontend.partials._googleAnalytics')
            @yield('scripts')

    </body>
</html>
