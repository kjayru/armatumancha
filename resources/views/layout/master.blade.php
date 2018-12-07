<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Arma tu mancha</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">


    <meta name="description" content="Arma tu mancha"/>

    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ARMA TU MANCHA" />
    <meta property="og:description" content="Arma tu mancha" />

    <meta property="fb:app_id" content="127684748131663"/>
    <meta property="og:image" content="{{env('APP_URL')}}/compartir.png" />
    <meta property="og:image:secure_url" content="{{env('APP_URL')}}/compartir.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />
    <meta property="og:image:alt" content="ARMA TU MANCHA" />



    <link rel="stylesheet" type="text/css" href="/css/common.css?v={{ uniqid() }}">
    <link rel="stylesheet" type="text/css" href="/css/main.css?v={{ uniqid() }}">
    <link rel="stylesheet" type="text/css" href="/css/style.css?v={{ uniqid() }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41368265-10"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-41368265-10');
    </script>

<!--
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
<!-- Global site tag (gtag.js) - Google Marketing Platform -->
<script async src="https://www.googletagmanager.com/gtag/js?id=DC-4532500"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'DC-4532500');
</script>
<!-- End of global snippet: Please do not remove -->
  </head>
  <body>
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : '127684748131663',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.2'
          });
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "https://connect.facebook.net/es_ES/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>

@if(Route::current()->getName() == 'home.graciasgigas')
<!--
Event snippet for REG_CompleteRegistrationGigas_2018-11-27 on http://armatumancha.claro.com.pe/gracias-gigas: Please do not remove.
Place this snippet on pages with events you’re tracking.
Creation date: 11/27/2018
-->
    <script>
            gtag('event', 'conversion', {
            'allow_custom_scripts': true,
            'send_to': 'DC-4532500/claro00f/reg_c0+standard'
            });
        </script>
        <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=4532500;type=claro00f;cat=reg_c0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""/>
    </noscript>
<!-- End of event snippet: Please do not remove -->
@endif

@if(Route::current()->getName() == 'home.graciasmillas')
<!--
Event snippet for REG_CompleteRegistrationMillas_2018-11-27 on http://armatumancha.claro.com.pe/gracias-millas: Please do not remove.
Place this snippet on pages with events you’re tracking.
Creation date: 11/27/2018
-->
    <script>
            gtag('event', 'conversion', {
            'allow_custom_scripts': true,
            'send_to': 'DC-4532500/claro00f/reg_c00+standard'
            });
        </script>
        <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=4532500;type=claro00f;cat=reg_c00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""/>
    </noscript>
<!-- End of event snippet: Please do not remove -->
@endif

@if(Route::current()->getName() == 'home.index')
<!--
Event snippet for LPG_LandingPage01_2018-11-27 on http://armatumancha.claro.com.pe/: Please do not remove.
Place this snippet on pages with events you’re tracking.
Creation date: 11/27/2018
-->
    <script>
            gtag('event', 'conversion', {
            'allow_custom_scripts': true,
            'send_to': 'DC-4532500/claro00g/lpg_l00+standard'
            });
        </script>
        <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=4532500;type=claro00g;cat=lpg_l00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""/>
    </noscript>
<!-- End of event snippet: Please do not remove -->
@endif
@if(Route::current()->getName() == 'register')
<!--
Event snippet for LPG_LandingPage02_2018-11-27 on http://armatumancha.claro.com.pe/register: Please do not remove.
Place this snippet on pages with events you’re tracking.
Creation date: 11/27/2018
-->
    <script>
            gtag('event', 'conversion', {
            'allow_custom_scripts': true,
            'send_to': 'DC-4532500/claro00g/lpg_l000+standard'
            });
     </script>
     <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=4532500;type=claro00g;cat=lpg_l000;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""/>
    </noscript>
<!-- End of event snippet: Please do not remove -->
@endif
<div class="layout" id="app">
     @include('layout.partials.navigationv2')

     @yield('content')

     @include('layout.partials.footer')
</div>

<div class="layout_modal" style="display: none;">
        <div class="overlay">
            <div class="box">
                <div class="box__inset">
                        <div id="vplayer"></div>
                        <a href="#" class="close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/jquery-migrate-1.4.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.js"></script>
    <script type="text/javascript" src="/js/vendor/slick.js" charset="utf-8"></script>
    <script src='//www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="/js/main.js?v={{ uniqid() }}"></script>
  </body>
</html>
