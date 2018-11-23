var APP = APP || {};

var main = (function(APP, win, $, undefined) {
  "use strict";

  var st = {
    list1: '#list1'
  };

  var dom = {};

  var page;

  var catchDom = function() {

  };

  var suscribeEvents = function() {

    if(page == "page2"){
      
      win.addEventListener('resize', events.eResize);

    }

  };

  var plugins = {
    slick: function(){
      dom.slick1 = $(st.list1).slick({
        arrows: true,
        dots: true,
        slidesToShow: 1,
        responsive: [
          /*{
              breakpoint: 9999,
              settings: "unslick"
          },*/ 
          {

            breakpoint: 426,
            settings: {
              slidesToShow: 1,
              arrows: true,
              dots: false
            }

          }
        ]
      });
    }
  }

  var methods = {
    
  }

  var events = {
    eResize: function(e){
      dom.slick1.slick('resize');
    }
  };

  return {
    init: function(x){
      page = x;

      suscribeEvents();

      if(page == "page2"){
        plugins.slick();
      }

    }
  }



})(APP, window, jQuery);



$('.listado-consideraciones .hv-padre-acordeon').on('click', function(){
      var target = $(this).attr('target'),
        span = $('.listado-consideraciones .hv-hijo-acordeon[target="'+target+'"]'),
        spanChild = span.find('div').outerHeight()+6;
      if(span.hasClass('act')){
        $(this).removeClass('act');
        span.removeClass('act').animate({height:0},300);
      } else {
        $('.listado-consideraciones .hv-padre-acordeon').removeClass('act');
        $(this).addClass('act');
        $('.listado-consideraciones .hv-hijo-acordeon.act').removeClass('act').animate({height:0},300);
        span.addClass('act').animate({height:spanChild},300);
      }
    });
    