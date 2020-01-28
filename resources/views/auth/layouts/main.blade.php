<!DOCTYPE HTML>
<html>
    <head>
        @include('frontend.partials._head')
        @yield('styles')
    </head>
    <body>
        <div id="app">
            <div class="header">
                @include('frontend.partials._header')
            </div>

            <div  style="background-color: white; margin-top: 10em;">
                 @yield('content')
            </div>
               
            <div class="footer">
                @include('frontend.partials._footer')
            </div>
            @include('frontend.partials._javascript')
            @yield('scripts')
        </div>
    </body>
</html>