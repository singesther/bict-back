<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('frontend.partials._head')
        @yield('styles')
    </head>
    <body>
        <div id="app">
            @include('frontend.partials._header')
            <div class="content-body">
                 @yield('content')
            </div>
               
            <div class="footer">
                @include('frontend.partials._footer')
            </div>
        </div>
            @include('frontend.partials._javascript')
            @yield('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools --> 
    </body>
</html>