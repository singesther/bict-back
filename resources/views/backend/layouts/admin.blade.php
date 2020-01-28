<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('backend.partials._head')
  @yield('stylesheets')
</head>
  <body>
    <!-- WRAPPER -->
    <div id="wrapper">
        @include('backend.partials._header')
        @include('backend.partials._left-sidebar')
        <div class="" id="myapp">
          <div id="main-content">
            <div class="container-fluid">
              @include('backend.partials._messages')
              @yield('content')
            </div>
          </div>
        </div>
        @include('backend.partials._footer')
      @include('backend.partials._javascript')
      @yield('scripts')
    </div>
  </body>
</html>
