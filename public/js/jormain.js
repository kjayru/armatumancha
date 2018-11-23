var vm = new Vue({
  data:{
    modal:{
      show: false,
      page1: false,
      page2: true,
      page3: false
    }
  },
  mounted: function(){
    const self = this;

    /*var slick1 = $('.section4 .section4__align .section4__main .list ').slick({
      arrows: true,
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 2,
      responsive: [
          /*{
              breakpoint: 9999,
              settings: "unslick"
          },
          {
            breakpoint: 769,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 450,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
    });
    */
    var slick2 = $('.section5 .section5__align .section5__main .list ').slick({
      arrows: true,
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 2,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
      responsive: [
          /*{
              breakpoint: 9999,
              settings: "unslick"
          },*/ 
          {
            breakpoint: 769,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 450,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
      ]
    });

    var slick3 = $('.layout__main .page1__main .section3__main .list ul').slick({
      arrows: true,
      dots: true,
      slidesToShow: 5,
      slidesToScroll: 2,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
      responsive: [
          /*{
              breakpoint: 9999,
              settings: "unslick"
          },*/ 

          {
            breakpoint: 450,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          }
      ]
    });


    var slick4 = $('.layout__main .page1__main .section1__main .content').slick({
      arrows: true,
      dots: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
      responsive: [
          {
              breakpoint: 9999,
              settings: "unslick"
          }, 

          {
            breakpoint: 450,
            settings: {
              arrows: true,
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              settings: "slick"
            }
          }
      ]
    });



    /*
    var slick2 = $('.section1__main .list').slick({
      //arrows: true,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
    });


    var slick3 = $('.section2__main .list').slick({
      //arrows: true,
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 2,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
    });


    var slick4 = $('.section7__main .list').slick({
      //arrows: true,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      //autoplay: true,
      //infinite: false,
      //centerMode: false,
      //centerPadding: '0px',
    });
    */


    $(window).resize(function() {
      //slick1.slick('resize');
      slick1.slick('resize');
      //slick2.slick('resize');
      //slick3.slick('resize');
      //slick4.slick('resize');
    });

    //$(tab).eq(1).removeClass('active');



    var questions = Array.apply(null, document.querySelectorAll('.questions__list ul li h3'));

    questions.filter(function (element, index) {

      /*element.firstChild.addEventListener("click", function(event){ 
        if (event.stopPropagation) {
          event.stopPropagation();
        } else {
          event.cancelBubble = true;
        }
      });*/

      element.addEventListener("click", function(event){ 

        var buttonClass = this.parentNode.classList;

        if(buttonClass.contains("active")){
          buttonClass.remove("active");
        }else{
          buttonClass.add("active");
        }

        var panel = this.nextElementSibling;

        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 

      });

    });


    /*
    
    var tab_1= $('#tb_1')
    var tab_2= $('#tb_2')

    tab_2.on('click', function () {
	    tab_2.addClass('active')	
	    if(tab_2.hasClass('active') ) {
	      tab_1.removeClass('active')
	    }
		})

		tab_1.on('click', function () {
	    tab_1.addClass('active')	
	    if(tab_1.hasClass('active') ) {
	      tab_2.removeClass('active')
	    }
		})

    */





	

    var considerations = document.querySelector('.considerations__subtitle');

    considerations.addEventListener("click", function(){ 

      var buttonClass = event.target.parentNode.parentNode.children[0].classList;

      if(buttonClass.contains("active")){
        buttonClass.remove("active");
      }else{
        buttonClass.add("active");
      }

      var panel = this.nextElementSibling;

      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 

    });
    
  
  },

  methods: {
    openVideo: function(url){
      this.video.url = url;

      //this.video.url = '<iframe id="video" width="560" height="315" :src="'+ url +'" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>';
      //this.video.url = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mvV5AloFRsY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      this.showModal();
    },
    showModal: function(){
      this.modal.show = true;
      document.querySelector("body").style.overflow = 'hidden';
    },
    closeModal: function(){
      this.modal.show = false;
      document.querySelector("body").style.overflow = 'auto';
    }
  }
}).$mount('#app');

function openVideo(url){
  vm.openVideo(url);
}

$('a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 500);
    return false;
});
