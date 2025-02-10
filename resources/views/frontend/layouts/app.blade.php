<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloudy - Hosting Service & WHMCS Template</title>
    <meta name="description" content="">
@include('frontend.layouts.components.styles')
  </head>
  <body>
    <div id="spinner-area">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
        <div class="spinner-txt">Cloudy...</div>
      </div>
    </div>
@include('frontend.layouts.components.menu')
@yield('content')
    *******************
    FOOTER
    *******************
    -->
    <footer class="footer">
        @include('frontend.layouts.components.footer')
    </footer>
    <a href="#0" class="cd-top"> <i class="fas fa-angle-up"></i> </a>
@include('frontend.layouts.components.scripts')
  </body>
</html>
