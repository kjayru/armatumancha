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
		list4: '#list4',
		list5: '#list5',
		list6: '#list6',
		tab1: '#tab1',
		tabcontent1: '#tabcontents1',

		page1: '.page1',
		page2: '.page2',
		page3: '.page3',

		tabDesktop: '#contenedorTAB',
		tabMobile: '#myTabDrop1-contents',
		//questions: '.questions__list ul li h3',
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

		win.addEventListener('resize', events.eResize);

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





	//---Slick---//

	var plugins = {
		slick: function(){

			dom.slick1 = $(st.list1).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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

			dom.slick2 = $(st.list2).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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

			dom.slick3 = $(st.list3).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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

			dom.slick4 = $(st.list4).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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

			dom.slick5 = $(st.list5).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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


			dom.slick6 = $(st.list6).slick({
				arrows: true,
				dots: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
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
							slidesToShow: 2,
							slidesToScroll: 2,
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

			if(methods.mGetUrlParameter('tab') == 'paquetesyrecargas'){
				dom.slick1.slick('setPosition');
			}


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
		},
		eTab: function(e){
			console.log("tab",e);
			if(e == 1){
				setTimeout(function(){
					dom.slick1.slick('setPosition');
				},300);
			}
		},

		eTabLink1: function(e){
			//console.log("tab",e);
			console.log("tabcontents1",e);

			dom.findTab1.filter(function (element, index) {
				//console.log("elementos",dom.findTab1);
				console.log("contenido",dom.findTabcontent1[index]);

				dom.findTabcontent1[index].style.display='none';

				var item = element.classList;

				if(index == e){
					item.add("active");
					dom.findTabcontent1[e].style.display='block';

					
					dom.slick1.slick('setPosition');
					dom.slick2.slick('setPosition');
					dom.slick3.slick('setPosition');
					dom.slick4.slick('setPosition');
					dom.slick5.slick('setPosition');
					dom.slick6.slick('setPosition');
					/**/

					/*
					setTimeout(function(){
						dom["slick"+e].slick('setPosition');
					},300);
					*/
					
					
				} else {
					if(item.contains("active")){
						item.remove("active");
					} 
				}

			});

			/*dom.findTabcontent1.filter(function (element, index) {
				//console.log("elementos",dom.findTab1);
				console.log("contenido",dom.findTabcontent1);

				var item = element.classList;

				if(index == e){
					item.add("active");
					dom.slick1.slick('setPosition');
					dom.slick2.slick('setPosition');
					dom.slick3.slick('setPosition');
					dom.slick4.slick('setPosition');
					dom.slick5.slick('setPosition');
					dom.slick6.slick('setPosition');
				} else {
					if(item.contains("active")){
						item.remove("active");
					} 
				}

			});*/

			

		},

		eOpenQuestions: function(e){

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
		init: function(){
			win.addEventListener("load", function(){

				catchDom();
				//suscribeEvents();
				//plugins.slick();

			});
		}
	}

})(APP, window, jQuery);





