var APP = APP || {};

APP.vue =  new Vue({
	data:{
		modal:{
      show: true,
      page1: true,
      page2: false,
      page3: false
    }
	},
	directives: {
		digitsonly: {
			// directive definition
			update: function (el, binding) {
				var regex = /^\d+$/;

				if (regex.test(el.value)) {
				} else {
					var newValue = el.value.replace(/[a-z A-Z]+/ig, '');
					el.value = newValue;
					binding.value = el.value;
				}
			}
		}
	},
	methods: {
		showModal: function(active){
      this.modal.show = true;

      /*if(active == "active1"){
        this.modal.page1 = true;
        //this.modal.page2 = false;
        this.modal.page3 = false;
      }else if(active == "active2"){
        //this.modal.page2 = true;
        //this.modal.page1 = false;
      }*/

      document.querySelector("body").style.overflow = 'hidden';
    },
    closeModal: function(){
      this.modal.show = false;
      //this.$refs.recaptcha.reset();
      document.querySelector("body").style.overflow = 'auto';
    },
	}
}).$mount('#app');

var main = (function(APP, win, $, undefined) {
	"use strict";

	var st = {
		list1: '#list1',
		list2: '#list2',
		list3: '#list3',
		page1: '.page1',
		page2: '.page2',
		page3: '.page3',
		considerations: '.considerations__subtitle'
	};

	var dom = {};

	var page;

	var catchDom = function() {
		//console.log("catchDom 1");

		/*dom.tabDesktop = document.querySelector(st.tabDesktop);
		dom.tabMobile = document.querySelector(st.tabMobile);

		dom.tab1 = document.querySelector(st.tab1);
		dom.tabcontent1 = document.querySelector(st.tabcontent1);

		if(dom.tabDesktop) dom.findTabDesktop = Array.apply(null, dom.tabDesktop.querySelectorAll('a[data-toggle="tab"]'));
		if(dom.tabMobile) dom.findTabMobile = Array.apply(null, dom.tabMobile.querySelectorAll('li'));

		dom.findTab1 = Array.apply(null, dom.tab1.querySelectorAll('.tablinks')); 
		dom.findTabcontent1 = Array.apply(null, dom.tabcontent1.querySelectorAll('.tabcontent')); 

		dom.page1 = document.querySelector(st.page1);
		dom.page2 = document.querySelector(st.page2);
		dom.page3 = document.querySelector(st.page3);

		if(dom.page1) dom.considerations1 = dom.page1.querySelector(st.considerations);
		if(dom.page2) dom.considerations2 = dom.page2.querySelector(st.considerations);
		if(dom.page3) dom.considerations3 = dom.page3.querySelector(st.considerations);*/

		//dom.questions1 = Array.apply(null, dom.page1.querySelectorAll(st.questions));
		//dom.questions2 = Array.apply(null, dom.page2.querySelectorAll(st.questions));
	};

	var suscribeEvents = function() {
		//console.log("suscribeEvents 1");

		if(page == "page1"){
      win.addEventListener('resize', events.eResize);
    }

		/*if(dom.tabDesktop){
			dom.findTabDesktop.filter(function (element, index) {
				element.addEventListener("click", events.eTab.bind(this, index));
			});
		}

		if(dom.tabMobile){
			dom.findTabMobile.filter(function (element, index) {
				element.addEventListener("click", events.eTab.bind(this, index));
			});
		}

		dom.findTab1.filter(function (element, index) {
			element.addEventListener("click", events.eTabLink1.bind(this, index));
		});*/
		

		/*dom.questions1.filter(function (element, index) {
			element.addEventListener("click", events.eOpenQuestions);
		});*/

		/*dom.questions2.filter(function (element, index) {
			element.addEventListener("click", events.eOpenQuestions);
		});*/

		/*if(dom.page1) dom.considerations1.addEventListener("click", events.eOpenConsiderations);
		if(dom.page2) dom.considerations2.addEventListener("click", events.eOpenConsiderations);
		if(dom.page3) dom.considerations3.addEventListener("click", events.eOpenConsiderations);*/
		
		//console.log("suscribeEvents 2");
	};

	var plugins = {
		slick: function(){

			dom.slick1 = $(st.list1).slick({
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

			dom.slick2 = $(st.list2).slick({
				arrows: true,
	      dots: true,
	      slidesToShow: 4,
	      slidesToScroll: 2,
	      responsive: [
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
              arrows: false,
              dots: true,
              variableWidth: true,
              slidesToShow: 1,
            }
          }
	      ]
			});

			dom.slick3 = $(st.list3).slick({
				arrows: true,
	      dots: true,
	      slidesToShow: 5,
	      slidesToScroll: 2,
	      responsive: [
          {
            breakpoint: 769,
              settings: {
              arrows: true,
              dots: true,
              slidesToShow: 4,
              slidesToScroll: 1,
            }
          },


          {
            breakpoint: 450,
            settings: {
              arrows: false,
              variableWidth: true,
              slidesToShow: 1,
            }
          }
	      ]
			});
		}
	}

	var methods = {
		mGetUrlParameter: function(name) {
			name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
			var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
			var results = regex.exec(location.search);
			return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
		}
	}

	var events = {
		eResize: function(e){
			dom.slick1.slick('resize');
			dom.slick2.slick('resize');
			dom.slick3.slick('resize');
		},
		eOpenConsiderations: function(){
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
		}
	};

	return {
		init: function(x){
			win.addEventListener("load", function(){
				page = x;

				catchDom();
				suscribeEvents();

				if(page == "page1"){
	        plugins.slick();
	      }

			});
		}
	}

})(APP, window, jQuery);