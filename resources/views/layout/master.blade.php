<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Arma tu mancha</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <link rel="stylesheet" type="text/css" href="/css/common.css?v={{ uniqid() }}">
    <link rel="stylesheet" type="text/css" href="/css/main.css?v={{ uniqid() }}">
  </head>
  <body>
    <div class="layout" id="app">
     @include('layout.partials.navigation')
       @yield('content')
     @include('layout.partials.footer')
    </div>
    <script type="text/javascript" src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/js/vendor/slick.js" charset="utf-8"></script>
    <script src='//www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="/js/main.js?v={{ uniqid() }}"></script>

  </body>
</html>
