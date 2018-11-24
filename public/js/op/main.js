var APP = APP || {};

/*-----------------------------*/

Vue.prototype.$path = APP.CORE.Path.host;

var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();

Vue.use(VueGrecaptcha, {
  sitekey: '6LfrU3EUAAAAAPtuHk-rNpNt8s3QroUqSlzZqwWH'
})

Vue.use(VeeValidate,{
  //errorBagName: 'errores', // change if property conflicts.
  //fieldsBagName: 'campos', 
  //events: 'input', // validate on input only
  locale: 'es',
  inject: false,
  dictionary: {
    es:{
      messages: {
        after: function after(field, _ref) {
          var _ref2 = _slicedToArray(_ref, 1),
              target = _ref2[0];

          return 'El campo ' + field + ' debe ser posterior a ' + target + '.';
        },
        alpha_dash: function alpha_dash(field) {
          return 'El campo ' + field + ' solo debe contener letras, números y guiones.';
        },
        alpha_num: function alpha_num(field) {
          return 'El campo ' + field + ' solo debe contener letras y números.';
        },
        alpha: function alpha(field) {
          return 'El campo ' + field + ' solo debe contener letras.';
        },
        before: function before(field, _ref3) {
          var _ref4 = _slicedToArray(_ref3, 1),
              target = _ref4[0];

          return 'El campo ' + field + ' debe ser anterior a ' + target + '.';
        },
        between: function between(field, _ref5) {
          var _ref6 = _slicedToArray(_ref5, 2),
              min = _ref6[0],
              max = _ref6[1];

          return 'El campo ' + field + ' debe estar entre ' + min + ' y ' + max + '.';
        },
        confirmed: function confirmed(field, _ref7) {
          var _ref8 = _slicedToArray(_ref7, 1),
              confirmedField = _ref8[0];

          return 'El campo ' + field + ' no coincide con ' + confirmedField + '.';
        },
        date_between: function date_between(field, _ref9) {
          var _ref10 = _slicedToArray(_ref9, 2),
              min = _ref10[0],
              max = _ref10[1];

          return 'El campo ' + field + ' debe estar entre ' + min + ' y ' + max + '.';
        },
        date_format: function date_format(field, _ref11) {
          var _ref12 = _slicedToArray(_ref11, 1),
              format = _ref12[0];

          return 'El campo ' + field + ' debe tener formato formato ' + format + '.';
        },
        decimal: function decimal(field) {
          var _ref13 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ['*'],
              _ref14 = _slicedToArray(_ref13, 1),
              decimals = _ref14[0];

          return 'El campo ' + field + ' debe ser númerico y contener ' + (decimals === '*' ? '' : decimals) + ' puntos decimales.';
        },
        digits: function digits(field, _ref15) {
          var _ref16 = _slicedToArray(_ref15, 1),
              length = _ref16[0];

          return 'El campo ' + field + ' debe ser númerico y contener exactamente ' + length + ' dígitos.';
        },
        dimensions: function dimensions(field, _ref17) {
          var _ref18 = _slicedToArray(_ref17, 2),
              width = _ref18[0],
              height = _ref18[1];

          return 'El campo ' + field + ' debe ser de ' + width + ' pixeles por ' + height + ' pixeles.';
        },
        email: function email(field) {
          return 'El campo ' + field + ' debe ser un correo electrónico válido.';
        },
        ext: function ext(field) {
          return 'El campo ' + field + ' debe ser un archivo válido.';
        },
        image: function image(field) {
          return 'El campo ' + field + ' debe ser una imagen.';
        },
        in: function _in(field) {
          return 'El campo ' + field + ' debe ser un valor válido.';
        },
        ip: function ip(field) {
          return 'Dirección IP inválida.';
        },
        max: function max(field, _ref19) {
          var _ref20 = _slicedToArray(_ref19, 1),
              length = _ref20[0];

          return 'Máximo ' + length + ' caracteres.';
        },
        mimes: function mimes(field) {
          return 'El campo ' + field + ' debe ser un tipo de archivo válido.';
        },
        min: function min(field, _ref21) {
          var _ref22 = _slicedToArray(_ref21, 1),
              length = _ref22[0];

          return 'Al menos ' + length + ' caracteres.';
        },
        not_in: function not_in(field) {
          return 'El campo ' + field + ' debe ser un valor válido.';
        },
        numeric: function numeric(field) {
          return 'El campo ' + field + ' debe contener solo caracteres númericos.';
        },
        regex: function regex(field) {
          return 'El formato del campo ' + field + ' no es válido.';
        },
        required: function required(field) {
          return 'Campo obligatorio.';
        },
        size: function size(field, _ref23) {
          var _ref24 = _slicedToArray(_ref23, 1),
              _size = _ref24[0];

          return 'El campo ' + field + ' debe ser menor a ' + _size + ' KB.';
        },
        url: function url(field) {
          return 'El campo ' + field + ' no es una URL válida.';
        }
      }
    }
  }
});

VeeValidate.Validator.extend('string', {
  getMessage: function(field){ return 'No es un formato valido' },
  validate: function(value){
    return new Promise( function(resolve, reject){

      var reg = /^[a-z][a-z\s]*$/i;

      if(reg.test(value)) {
        resolve({ valid: true })
      } else {
        resolve({ valid: false })
      }

    })
  }
});

VeeValidate.Validator.extend('robot', {
  getMessage: function(field){ return 'La suma no es correcta' },
  validate: function(value){
    return new Promise( function(resolve, reject){

      var answer = vm.robot.n1 + vm.robot.n2;

      if(answer == value) {
        resolve({ valid: true })
      } else {
        resolve({ valid: false })
      }

    })
  }
});

VeeValidate.Validator.extend('norepeat1', {
  getMessage: function(field){ return 'Ya existe esa mancha' },
  validate: function(value){
    return new Promise( function(resolve, reject){


      axios.all([
        axios.get('js/json/mancha.json')
      ])
      .then(axios.spread(function (resp1) {

        console.log("resp1",resp1);

        /*for (var i = 0; i < resp1.length; i++) {
          console.log("resp1",i);
        }*/

        resp1.data.filter(function(item) {
          if(item.mancha == value ){
            resolve({ valid: false });
          }else{
            resolve({ valid: true });
          }
          
        });

        /*resp1.each(function(item){

        });*/

        /*resp1.forEach(function(item){
          if(item.mancha == value ){
            resolve({ valid: false });
          }else{
            resolve({ valid: true });
          }
        });*/

      }))
      .catch(function (error) {
        console.log("error principal");
        console.dir(error);
      });
      

    })
  }
});


VeeValidate.Validator.extend('norepeat2', {
  getMessage: function(field){ return 'Alias repetidos' },
  validate: function(value){
    return new Promise( function(resolve, reject){

      console.log("datos", APP.vue.register.alias);
      console.log("datos valor", value);

      //var pass = 0;


      setTimeout(function() {
        /*if (APP.vue.register.alias == value) {
          resolve({ valid: false });
        }else{
          resolve({ valid: true });
        }*/



        APP.vue.register.miembros.filter(function(item, i){

          //console.log("alias",item[0].alias);

          if(item[0].alias == value ){
            resolve({ valid: false });
          }else{
            resolve({ valid: true });
          }
        });

      }, 200);


      /*if (APP.vue.register.alias == value) {
        APP.vue.register.miembros.filter(function(item){

          console.log("datos", APP.vue.register.alias);

          if(item[0].alias == value){
            resolve({ valid: false });
          }
          
        });
        resolve({ valid: true });

      }else{
        resolve({ valid: false });
      }*/

      

      /*console.log("datos pass", pass);

      if(pass == 0){
        resolve({ valid: true })
      }else{
        resolve({ valid: false })
      }*/

      /*if (APP.vue.register.alias == value) {
        pass++
      }*/

      /*if (APP.vue.register.alias == value) {
      //if (APP.vue.register.alias.indexOf(value) === -1) {
        resolve({ valid: false })
      } else{
        resolve({ valid: true })
      }*/

    })
  }
});


/*-----------------------------*/

APP.vue =  new Vue({
  data:{
    modal:{
      show: false,
      list1:{
        page1: false,
        page2: false,
        page3: false
      }
    },
    captcha:{
      captchaResponse: '',
      captchaResponseCallback: false,
    },
    alias_verificar: [],
    count: 0,
    mancha:{
      list1:{
        register:{
          alias:'',
          telefono:'',
          email:'',
          inscripcion:1,
          calificacion: 1,
          lider: false
        },
        elegido: '',
        miembros: [
          { id:0 , alias: 'spiderman1', telefono: '996******', email: 'corr***@prueba.com', inscripcion: 1, calificacion: 1, lider: false },
          { id:1 ,alias: 'spiderman2', telefono: '996******', email: 'corr***@prueba.com', inscripcion: 2, calificacion: 1, lider: false },
          { id:2 ,alias: 'spiderman3', telefono: '996******', email: 'corr***@prueba.com', inscripcion: 1, calificacion: 2, lider: false },
          { id:3 ,alias: 'spiderman4', telefono: '996******', email: 'corr***@prueba.com', inscripcion: 2, calificacion: 1, lider: true },
          { id:4 ,alias: 'spiderman5', telefono: '996******', email: 'corr***@prueba.com', inscripcion: 1, calificacion: 2, lider: false }
        ]
      }
    },
    register:{
      nombres:'',
      alias:'',
      telefono:'',
      email:'',
      beneficio: '',
      autorizar: '',
      miembros: [
        [{
          alias:'',
          telefono:'',
          email:''
        }]
      ]
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
  mounted: function(){
    const self = this;

  },
  methods: {
    showList1Page1: function(){
      const self = this;

      self.mancha.list1.register.alias = '';
      self.mancha.list1.register.telefono = '';
      self.mancha.list1.register.email = '';

      self.showModal('list1','page1');
      
    },
    showList1Page2: function(){
      const self = this;

      self.showModal('list1','page2');
    },
    showList1Page3: function(){
      const self = this;

      self.showModal('list1','page3');
    },
    resultList1Page2: function(){
      const self = this;

      self.mancha.list1.miembros.filter(function(field, i){

        if(field.id == self.mancha.list1.elegido.id){
          field.lider = true;
        }else{
          field.lider = false;
        }
      });

      self.mancha.list1.elegido = '';
      self.closeModal('list1','page2');
    },
    resultList1Page3: function(){
      const self = this;

      self.mancha.list1.miembros.filter(function(field, i){

        if(field.id == self.mancha.list1.elegido.id){
          self.mancha.list1.miembros.splice(i, 1);
        }
      });

      self.mancha.list1.elegido = '';
      self.closeModal('list1','page3');
    },
    showStatus1: function(state){
      const self = this;

      if(state == 2){
        return 'ico_status4';
      }else if(state == 1){
        return 'ico_status3';
      }
     
    },
    showStatus2: function(state){
      const self = this;

      if(state == 2){
        return 'ico_status2';
      }else if(state == 1){
        return 'ico_status3';
      }
     
    },
    addMember: function() {
      const self = this;

      self.count++;

      if(self.count < 10){
        self.register.miembros.push([{
          alias: '',
          telefono: '',
          email: ''
        }]);
      }
      
    },
    showModal: function(group, page){
      const self = this;

      self.modal.show = true;
      self.modal[group][page] = true;

      document.querySelector("body").style.overflow = 'hidden';
    },
    closeModal: function(group, page){
      const self = this;

      self.modal.show = false;
      self.modal[group][page] = false;

      self.mancha.list1.elegido = '';

      //this.$refs.recaptcha.reset();
      document.querySelector("body").style.overflow = 'auto';
    },
    validate: function(scope) {
      const self = this;

      /*self.showModal();

      return;*/

      self.$validator.validateAll(scope).then(function(result) {

        if(self.captcha.captchaResponse.length == 0){
          self.captcha.captchaResponseCallback = true;
          return;
        }else{
          self.captcha.captchaResponseCallback = false;
        }

        if (result) {

          var envio = _.cloneDeep(self.register);

          /*console.log("enviado el resgitro", envio);
          self.showModal('active1');

          return;*/

          //console.log("SEND RESULT APP.CORE.Path.register",APP.CORE.Path.register);
          //console.log("SEND RESULT envio",envio);

          self.showLoader();

          axios.post(APP.CORE.Path.register, envio).then(function(response){
    
            if(response.data.status == true && response.data.info == 'ok'){

              self.register.nombres = '';
              self.register.celular = '';
              self.register.tipo_documento = 'dni';
              self.register.documento = '';
              self.register.correo = '';

              self.captcha.captchaResponseCallback = false;

              self.$validator.pause()

              self.$nextTick(function() {
                self.$validator.reset();
                self.$validator.errors.clear();
                self.$validator.resume();
              })

              self.showModal('active1');

            }else if(response.data.status == false && response.data.info == 'dni'){
              APP.CORE.Util.notificacion(0, "tc", "", '• ' + 'El Dni ya ha sido registrado', 4000);
              self.closeLoader(false);
            }else{
              APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + response.data.info, 4000);
              self.closeLoader(false);
            }

          }, function(error){
            APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + error, 4000);
            self.closeLoader(false);
          });

          return;
        }

      }).catch(function(error){

        console.log("ERROR RESULT",error);
        APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + error, 4000);
      });
    },
    validateList1AddMember: function(scope) {
      const self = this;

      /*self.showModal();

      return;*/

      self.$validator.validateAll(scope).then(function(result) {

        if (result) {

          var envio = _.cloneDeep(self.mancha.list1.register);

          envio.id = self.mancha.list1.miembros.length + 1; 

          self.mancha.list1.miembros.push(envio);

          self.closeModal('list1','page1');

          self.mancha.list1.register.alias = '';
          self.mancha.list1.register.telefono = '';
          self.mancha.list1.register.email = '';

          return;

          /*console.log("enviado el resgitro", envio);
          self.showModal('active1');

          return;*/

          //console.log("SEND RESULT APP.CORE.Path.register",APP.CORE.Path.register);
          //console.log("SEND RESULT envio",envio);

          self.showLoader();

          axios.post(APP.CORE.Path.register, envio).then(function(response){
    
            if(response.data.status == true && response.data.info == 'ok'){

              self.register.nombres = '';
              self.register.celular = '';
              self.register.tipo_documento = 'dni';
              self.register.documento = '';
              self.register.correo = '';

              self.captcha.captchaResponseCallback = false;

              self.$validator.pause()

              self.$nextTick(function() {
                self.$validator.reset();
                self.$validator.errors.clear();
                self.$validator.resume();
              })

              self.showModal('active1');

            }else if(response.data.status == false && response.data.info == 'dni'){
              APP.CORE.Util.notificacion(0, "tc", "", '• ' + 'El Dni ya ha sido registrado', 4000);
              self.closeLoader(false);
            }else{
              APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + response.data.info, 4000);
              self.closeLoader(false);
            }

          }, function(error){
            APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + error, 4000);
            self.closeLoader(false);
          });

          return;
        }

      }).catch(function(error){

        console.log("ERROR RESULT",error);
        APP.CORE.Util.notificacion(0, "tc", "Error:", '• ' + error, 4000);
      });
    }
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

    dom.page1 = document.querySelector(st.page1);
    if(dom.page1) dom.considerations1 = dom.page1.querySelector(st.considerations);

  };

  var suscribeEvents = function() {

    if(page == "page1"){
      win.addEventListener('resize', events.eResize);
    }

    if(dom.page1) dom.considerations1.addEventListener("click", events.eOpenConsiderations);

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
              settings: "slick",
              infinite: false
            }
          }
        ]
      });

      dom.slick2 = $(st.list2).slick({
        arrows: true,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 1,
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
              slidesToScroll: 1,
              slidesToShow: 1,
            }
          }
        ]
      });

      dom.slick3 = $(st.list3).slick({
        arrows: true,
        dots: true,
        slidesToShow: 5,
        slidesToScroll: 1,
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
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
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