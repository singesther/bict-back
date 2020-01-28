@yield('connection')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
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
        <section>
            @yield('beforesection')
            <article>
                @yield('article')
            </article>
            <aside>
                @include('partials._aside')
            </aside>
        </section>
        <footer>
            @include('partials._footer')
        </footer>
            @include('partials._googleAnalytics')
    </body>
</html>
