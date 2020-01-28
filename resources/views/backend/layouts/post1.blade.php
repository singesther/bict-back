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
      <div class="main">
        @include('backend.partials._messages')
        <div class="main-content" id="myapp">
          <div class="content-wrapper">
            <div class="container-fluid">
              
                @yield('content')
              
            </div>
          </div>
          @include('backend.partials._footer')
        </div>
      </div> 
    </div>
    @include('backend.partials._javascript')
    @yield('scripts')
  </body>
</html>
