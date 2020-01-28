@yield('connection')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
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
            @include('partials._header')
        </header>
        <div class="container articlesection">
            @yield('beforesection')
            <div class="col-md-9 article" style="background-color: white;">
                <div class="container-fluid" id="app">
                @include('partials._messages')
                @yield('article')
                </div>
            </div>
            <div class="col-md-3 aside">
                @include('partials._aside-article')
            </div>
        </div>
        <footer>
            @include('partials._footer')
        </footer>
            @include('partials._googleAnalytics')
            @yield('scripts')
            @include('partials._javascript')
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59e2dedfa94d7b75"></script>
  </body>
</html>
