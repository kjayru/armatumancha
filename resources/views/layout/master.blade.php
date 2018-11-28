<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Arma tu mancha</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <link rel="stylesheet" type="text/css" href="/css/common.css?v={{ uniqid() }}">
    <link rel="stylesheet" type="text/css" href="/css/main.css?v={{ uniqid() }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41368265-10"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-41368265-10');
    </script>
  </head>
  <body>

    <div class="layout" id="app">
     @include('layout.partials.navigation')
       @yield('content')
     @include('layout.partials.footer')
    </div>
    <script type="text/javascript" src="/js/vendor/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.js"></script>
    <script type="text/javascript" src="/js/vendor/slick.js" charset="utf-8"></script>
    <script src='//www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="/js/main.js?v={{ uniqid() }}"></script>

    


  </body>
</html>
