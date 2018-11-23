<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Arma tu mancha</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <script type="text/javascript" src="js/library/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css?v={{ uniqid() }}">
  </head>
  <body>

       @yield('content')

    <script type="text/javascript" src="js/library/vue.js"></script>
    <script type="text/javascript" src="js/library/axios.js"></script>
    <script type="text/javascript" src="js/library/toastr.js"></script>
    <script type="text/javascript" src="js/library/lodash.js"></script>
    <script type="text/javascript" src="js/library/vee-validate.min.js"></script>
    <script type="text/javascript" src="js/library/vue-grecaptcha.js"></script>
    <script type="text/javascript" src="js/vue/helpers/core.js"></script>
    <script type="text/javascript" src="js/library/slick.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/main.js?v={{ uniqid() }}"></script>
    <script type="text/javascript">main.init('page1');</script>
  </body>
</html>
