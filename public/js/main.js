/**PREGUNTAS FRECUENTES */
var questions = Array.apply(null, document.querySelectorAll('.questions__list ul li h3'));

questions.filter(function (element, index) {

  element.addEventListener("click", function(event){
    e.preventDefault();
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
//eventos first mobile
$(document).ready(function(){
    "use strict";


    $(".layout__header--button").click(function(){
        $(this).toggleClass("active");
        $(this).parent("nav").children("ul").toggleClass("active");
    });
    prefix();
    $("#lidercel").numeric();
    $("#nombres").on('blur',function(){
        var valor = $(this).val();

        let contenedor = $(this);
        var token = $("#fr-data input[name='_token']").val();

         var sendata = {'_token':token,'_method':'POST','nombres':valor};
         if(valor.length>0){
            $.ajax({
                url:'/disponibilidad-mancha',
                type:'POST',
                data:sendata,
                dataType:'json',
                success:function(response){
                    if(response.rpta == 'existe'){
                        contenedor.addClass('error');
                        contenedor.after('<span class="error"> Nombre de mancha ya utilizado </span>');
                        $("#existemancha").val(1);
                    }
                    if(response.rpta == ''){
                        contenedor.addClass('error');
                        contenedor.after('<span class="error"> No use caracteres especiales </span>');
                        $("#existemancha").val(1);
                    }

                }
            });
        }
    });

    $("#nombres").focusin(function(e){
        e.preventDefault();

         $(this).parent('dt').children("span").remove();
         $("#existemancha").val(0);
     });


    let slick1 = $("#list1").slick({
        responsive: [
          {
            breakpoint: 9999,
            settings: "unslick",
            infinite: false,
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

    let slick2 = $("#list2").slick({
        arrows: true,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
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

    let slick3 = $("#list3").slick({
        arrows: true,
        dots: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: false,
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


      var questions = Array.apply(null, document.querySelectorAll('.questions__list ul li h3'));

      questions.filter(function (element, index) {



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

      var considerations = Array.apply(null, document.querySelectorAll('.considerations__subtitle'));

      considerations.filter(function (element, index) {

        element.addEventListener("click", function(event){

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

      });

      let c = 1;
      $(".add-pata").on('click',function(e){

        c += 1;

        if(c<10){

        let pata =  `<div class="form__members ">
        <div class="form__fields form__fieldsNO">
          <div class="form__fields--title">
            <h3>Miembro # <span>${c}</span></h3>
          </div>
          <dl>
            <dt>
              <input name="alias[]" class="form__text2 aliaspata unique alias${c}"  type="text" maxlength="20" id="alias${c}" placeholder="Alias" />
            </dt>
            <dd><span class="form__error" ></span></dd>
          </dl>
          <dl>
            <dt>

            <input class="form__text2  cellpata unique cellpata${c}" maxlength="9"  name="telefono[]" type="text" id="cellpata${c}"  placeholder="Teléfono" />

              <dd><span class="form__error" ></span></dd>
            </dt>
          </dl>
          <dl>
            <dt>
              <input class="form__text2"  name="email[]" type="email"  id="email${c}" placeholder="Email (opcional)" />
            </dt>
            <dd><span class="form__error" ></span></dd>
          </dl>
        </div>
      </div>`;

      $(".mispatas").append(pata);
      $(`#cellpata${c}`).numeric();



        }else{
            $(this).addClass('disabled');

        }
      });


//validate



$.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /[a-z0-9]+@[a-z0-9]+\.[a-z]+/.test( value );
  };
$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
   }, "Valor no es igual");

$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Solo Letras y números  por favor");







    $("#Autorizar").change(function(){
        if($("#Autorizar").is(':checked')){
            $(".lbl-autorizar").html("");
        }
    });

    var numpatas =[];
    var nompata = [];
    $(document).on('blur',".cellpata",function(){
        var valor = $(this).val();
        numpatas.push(valor);

    });
    $(document).on('blur',".aliaspata",function(){

        var valor = $(this).val();
        nompata.push(valor);



    });


    $(document).on('focusin',".cellpata",function(){
        $(this).parent().children('label').remove();
        $(this).removeClass("error");

    });

    $(document).on('focusin',".aliaspata",function(){
        $(this).parent().children('label').remove();
        $(this).removeClass("error");
    });
    $(document).on('focusin',"#lidercel",function(){
        $(this).parent().children('label').remove();
        $(this).removeClass("error");
        $("#existelider").val(0);
    });

    let display=false;

    $("#lbl-autoriza").click(function(){

        if($(this).hasClass("lbl-autoriza-activo")){
            $(this).removeClass("lbl-autoriza-activo");
            $("#autorizar").attr('checked',false);


        }else{
          $(this).addClass("lbl-autoriza-activo");
          $("#autorizar").attr('checked',true);
        }

    });



    if(display===true){
        console.log(display);
        $("#autorizar").attr('checked',true);
    }else if(display===false){
        console.log(display);
        $("#autorizar").attr('checked',false);
    }

    $(document).on('focusin',".activo-cellpata",function(){
        numpatas=[];
        console.log(numpatas.length);
    });

    $(document).on('focusin',".activo-aliaspata",function(){
        nompata=[];
        console.log(nompata.length);
    });
///validador principal

var validaton =  $("#fr-mancha").validate({
   /* errorPlacement: function(error, element) {
        if (element.attr("name") == "beneficio" )
        error.appendTo('.form__error');
      },*/

    rules: {
        ignore: [],

        name:{
            required:true,
            maxlength:15,
            alphanumeric:true
        },
        lidername:{
            required:true,
        },
        lidercel:{
            required:true,
            minlength:9
        },

        lideremail:{
            email:true

        },
        'alias[]':{
            required:true,
            maxlength:20
        },
        'telefono[]':{
            required:true,
            minlength:9
        }



    },
    messages: {
        name: {
            required:"Ingresa el nombre de tu mancha",
            maxlength:"Máximo 15 caracteres",
            unique: "Esta valor debe ser unico"
        },
        lidername:{
            required:"Ingrese su alias de lider",
            unique: "Esta valor debe ser unico"
        },
        lidercel:{
             required:"Ingrese su número de celular",
             minlength:"Ingresa un número celular válido",
             unique: "Esta valor debe ser unico"
        },
        lidermail: "Ingrese un email válido",
        'alias[]':{
            required:"Completar Alias",
            maxlength:"Máximo 20 caracteres",
            unique: "Esta valor debe ser unico"
        },
        'telefono[]':{
            required:"Ingrese su número de celular",
             minlength:"Ingresa un número celular válido",
             unique: "Esta valor debe ser unico"
        }



    }
});

$.validator.addMethod("unique", function(value, element) {
    var parentForm = $(element).closest('form');
    var timeRepeated = 0;
    if (value != '') {
        $(parentForm.find(':text')).each(function () {
            if ($(this).val() === value) {
                timeRepeated++;
            }
        });
    }
    return timeRepeated === 1 || timeRepeated === 0;

}, "* Duplicate");


$("#fr-mancha input[name='beneficio']:radio").change(function(e){

    e.stopPropagation();

    if( $("#fr-mancha input[name='beneficio']:radio").is(':checked')) {
      $('.content__error').hide();

      var position = $('#formu_register').offset().top - 100;

      $("body, html").animate({
        scrollTop: position
      }  );

    }else{
      $('.content__error').show();

    }
});

$(document).on('blur','#fr-mancha input',function(){

    $('.send-mancha').attr('disabled',false).html('Registrar');
});
$(".content__item").on('click',function(){
    $('.send-mancha').attr('disabled',false).html('Registrar');
});
let campo0,campo1,campo2 ,campo3,campo4,campo5,campo6,campo7,
campo8,campo9,campo10,campo11,campo12,campo13,campo14,
campo15,campo16;

$("#fr-mancha input[name='beneficio']:radio").change(function(){
    $("#fr-mancha input[name='beneficio']:radio").parent().parent().parent().children('dd').children().html('');
});
    $(document).on('click','.send-mancha',function(e){
        //verifica duplicidad

        e.stopPropagation();

        $(this).attr('disabled','disabled').html('Validando..');

        if( $("#fr-mancha input[name='beneficio']:radio").is(':checked')) {

          $('.content__error').hide();
          campo0 = true;
        }else{
          $('.content__error').show();
          campo0 = false;
        }


        $("#autorizar").change(function(){
            $(".lbl-autorizar").html("");
        });



        if($("#autorizar").is(':checked')){
        }else{
            $(".lbl-autorizar").html("*Campo obligatorio");
        }
        $(".error2").html("");


        if( $("#fr-mancha input[name='beneficio']:radio").is(':checked')) {
        }else{
    $("#fr-mancha input[name='beneficio']:radio").parent().parent().parent().children('dd').children().html('Seleccione un benificio');
        }

    if($("#fr-mancha input").hasClass("cellpata2")){

        if(validaton.check('#cellpata2')===false){
            $("#cellpata2").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');

            campo1 = false;

        }else{

            campo1 = true;
        }
    }



    if($("#fr-mancha input").hasClass("cellpata3")){
       // validaton.element("#cellpata3");
        if(validaton.check('#cellpata3')===false){
           $("#cellpata3").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
            campo2 =  false;
        }else{
            campo2 = true;
        }
    }

    if($("#fr-mancha input").hasClass("cellpata4")){
       // validaton.element("#cellpata4");
        if(validaton.check('#cellpata4')===false){
         $("#cellpata4").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
            campo3 = false;
        }else{
            campo3 = true;
        }
    }

    if($("#fr-mancha input").hasClass("cellpata5")){
        //validaton.element("#cellpata5");
        if(validaton.check('#cellpata5')===false){
          $("#cellpata5").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
            campo4 = false;
        }else{
            campo4 = true;
        }

    }

    if($("#fr-mancha input").hasClass("cellpata6")){
       // validaton.element("#cellpata6");
        if(validaton.check('#cellpata6')===false){
          $("#cellpata6").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
           campo5 = false;
        }else{
            campo5 = true;
        }
    }

    if($("#fr-mancha input").hasClass("cellpata7")){
        //validaton.element("#cellpata7");
        if(validaton.check('#cellpata7')===false){
          $("#cellpata7").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');

          campo6 = false;
        }else{
          campo6 = true;
        }
    }

    if($("#fr-mancha input").hasClass("cellpata8")){
       // validaton.element("#cellpata8");
        if(validaton.check('#cellpata8')===false){
          $("#cellpata8").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
            campo7 = false;
        }else{
            campo7 = true;
        }
    }

    if($("#fr-mancha input").hasClass("cellpata9")){
        //validaton.element("#cellpata9");
        if(validaton.check('#cellpata9')===false){
          $("#cellpata9").addClass("activado").after('<label class="error2">Ingrese su número de celular</label>');
            campo8 = false;
        }else{
            campo8 = true;
        }
    }
///alias

    if($("#fr-mancha input").hasClass("alias2")){
      //  validaton.element("#alias2");
        if(validaton.check('#alias2')===false){
          $("#alias2").addClass("activado").after('<label class="error2">Completar Alias</label>');
            campo9 = false;
        }else{
            campo9 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias3")){
        //validaton.element("#alias3");
        if(validaton.check('#alias3')===false){
          $("#alias3").addClass("activado").after('<label class="error2">Completar Alias</label>');
            campo10 = false;
        }else{
            campo10 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias4")){
      //  validaton.element("#alias4");
        if(validaton.check('#alias4')===false){
          $("#alias4").addClass("activado").after('<label class="error2">Completar Alias</label>');
          campo11 = false;
        }else{
          campo11 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias5")){
       // validaton.element("#alias5");
        if(validaton.check('#alias5')===false){
          $("#alias5").addClass("activado").after('<label class="error2">Completar Alias</label>');

          campo12 = false;
        }else{
          campo12 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias6")){
        //validaton.element("#alias6");
        if(validaton.check('#alias6')===false){
          $("#alias6").addClass("activado").after('<label class="error2">Completar Alias</label>');

            campo13 = false;
        }else{
            campo13 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias7")){
        //validaton.element("#alias7");
        if(validaton.check('#alias7')===false){
          $("#alias7").addClass("activado").after('<label class="error2">Completar Alias</label>');

            campo14 = false;
        }else{
            campo14 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias8")){
       // validaton.element("#alias8");
        if(validaton.check('#alias8')===false){
          $("#alias8").addClass("activado").after('<label class="error2">Completar Alias</label>');
            campo15 = false;
        }else{
            campo15 = true;
        }
    }

    if($("#fr-mancha input").hasClass("alias9")){
       // validaton.element("#alias9");
        if(!validaton.check('#alias9')===false){
          $("#alias9").addClass("activado").after('<label class="error2">Completar Alias</label>');
            campo16 = false;
        }else{
            campo16 = true;
        }
    }

if($("#fr-mancha").valid()===true){

    if(campo1==false){
        return false;
    }
    if(campo2==false){
        return false;
    }
    if(campo3==false){
        return false;
    }
    if(campo4==false){
        return false;
    }
    if(campo5==false){
        return false;
    }
    if(campo6==false){
        return false;
    }
    if(campo7==false){
        return false;
    }
    if(campo8==false){
        return false;
    }
    if(campo9==false){
        return false;
    }
    if(campo10==false){
        return false;
    }
    if(campo11==false){
        return false;
    }
    if(campo12==false){
        return false;
    }
    if(campo13==false){
        return false;
    }
    if(campo14 ==false){
        return false;
    }
    if(campo15 ==false){
        return false;
    }
    if(campo16 ==false){
        return false;
    }


    if( $("#fr-mancha input[name='beneficio']:radio").is(':checked')) {
    }else{
      return false;
    }

    /*var $elegido =$("input[name=beneficio]:checked");

    if ($elegido.val())
      $('.content__error').show();
    else {
      $('.content__error').hide();
      return false;
    } */


            if($("#autorizar").is(':checked')){

            }else{
                $(".lbl-autorizar").html("*Campo obligatorio");
                return false;
            }

            //captpcha
            var response = grecaptcha.getResponse();

            if(response.length == 0){

                $(".lbl-captcha").html("Validación obligatoria");
                return false;
            }
            let imancha =  $("#existemancha").val();
            let ilider = $("#existelider").val();

            if(imancha == "1"){
                alert("Este nombre ya existe.");
                return false;
            }
            if(ilider == "1"){
                alert("Este numero esta registrado en otro grupo.");
                $('.send-mancha').attr('disabled',false).html('Registrar');
                return false;

            }else{


                $("#fr-mancha").submit();
            }


        }else{
            $('.send-mancha').attr('disabled',false).html('Registrar');
            return false;
        }
    });



//session button
    $(".box__inset").hide();
    $(".modal-1").on('click',function(e){
        e.preventDefault();

        $(".layout__modal").fadeIn(350,'swing',function(){
            $(".box__inset").delay(350).fadeIn(350,'swing',function(){
                $(".page1").fadeIn(350);
            });
        });
    });

    $(".modal-2").on('click',function(e){
        e.preventDefault();

        $(".estado-client").each(function(){
            if($(this).is(':checked')){

                let id = $(this).data('id');
                let liderid = $('.star').data('liderid');

                let aliaspata = $(this).data('aliaspata');

                let aliaslider = $(this).parent().parent().parent().children("tr").children('td:nth-child(2)').data('aliaslider');

                let grupo = $(this).data('mancha');


                //modal de consulta

                $(".layout__modal").fadeIn(350,'swing',function(){
                    $(".box__inset").delay(350).fadeIn(350,'swing',function(){
                        $(".mod-lider").fadeIn(350);
                        $(".esta-seguro").show();
                        $(".i-lider").html(aliaspata);
                        $(".i-nombre b").html(grupo);

                        $("#datapata").val(id);
                        $("#datalider").val(liderid);


                        return false;
                    });
                });


            }


        });

        if($(".estado-client").is(':checked')){

        }else{
            alert("Marque una casilla, para activar este proceso");
            return false;
        }


    });


    $(".modal-3").on('click',function(e){
        e.preventDefault();

        $(".estado-client").each(function(){
            if($(this).is(':checked')){

                let id = $(this).data('id');
                let liderid = $('.star').data('liderid');

                let aliaspata = $(this).data('aliaspata');

                if(id===liderid){
                    alert("esta acción no procede");
                    return false;
                }


                $(".layout__modal").fadeIn(350,'swing',function(){
                    $(".box__inset").delay(350).fadeIn(350,'swing',function(){
                        $(".mod-lider").hide();
                        $(".esta-seguro").hide();
                        $(".mod-delete").show();

                        $(".i-borrar").html(aliaspata);

                        $("#datapata2").val(id);



                        return false;
                    });
                });

                /*let token = $("#fordata input[name='_token']").val();

                let dataform = ({'_token':token,'_method':'DELETE','user_id':id, 'lider_id':liderid});
                $.ajax({
                    url:'/borrar-pata/'+id,
                    method:'POST',
                    dataType:'json',
                    data:dataform,
                    success:function(response){
                        if(response.rpta=='ok'){
                            window.location.reload();
                        }
                    }

                });*/
            }


        });

        if($(".estado-client").is(':checked')){

        }else{
            alert("Marque una casilla, para activar este proceso");
            return false;
        }
    });


    $(".btn-delete").click(function(e){
        e.preventDefault();
        let id =  $("#datapata2").val();

        let token = $("#fordata input[name='_token']").val();

                let dataform = ({'_token':token,'_method':'DELETE','user_id':id});
                $.ajax({
                    url:'/borrar-pata/'+id,
                    method:'POST',
                    dataType:'json',
                    data:dataform,
                    success:function(response){
                        if(response.rpta=='ok'){
                            window.location.reload();
                        }else{

                            $(".mod-delete p").html("No es posible eliminar a un participante confirmado");
                            return false;
                        }
                    }

                });
    });
    $(".page1__close").on('click',function(e){
        e.preventDefault();
        $(".box__inset").fadeOut(350,'swing',function(){
            $(".layout__modal").delay(350).fadeOut(350,'swing',function(){
                $(".page1").fadeOut(350);
                $(".page2").fadeOut(350);
            });
        });
    });
    $(".page2__close").on('click',function(e){
        e.preventDefault();
        $(".box__inset").fadeOut(350,'swing',function(){
            $(".layout__modal").delay(350).fadeOut(350,'swing',function(){
                $(".page1").fadeOut(350);
                $(".page2").fadeOut(350);
            });
        });
    });

    $(".btn-ok").on('click',function(e){
        e.preventDefault();
        $(".box__inset").fadeOut(350,'swing',function(){
            $(".layout__modal").delay(350).fadeOut(350,'swing',function(){
                $(".page1").fadeOut(350);
                $(".page2").fadeOut(350);
                $(".esta-seguro").hide();
                $(".confirma").hide();
            });
        });
    });

    $(".btn-lider-no").on('click',function(e){
        e.preventDefault();
        $(".box__inset").fadeOut(350,'swing',function(){
            $(".layout__modal").delay(350).fadeOut(350,'swing',function(){
                $(".page1").fadeOut(350);
                $(".page2").fadeOut(350);
                $(".esta-seguro").hide();
                $(".confirma").hide();
            });
        });
    });

    let i=0;
    $(".btn-lider-si").on('click',function(e){
        e.preventDefault();
        console.log("eventoooo");
        let token = $("#fordata input[name='_token']").val();
        let id =  $("#datapata").val();
        let liderid =  $("#datalider").val();

                let dataform = ({'_token':token,'_method':'POST','user_id':id, 'lider_id':liderid});


                $.ajax({
                    url:'/asignar-lidermancha',
                    method:'POST',
                    dataType:'json',
                    data:dataform,
                    beforeSend:function(){
                        console.log("enviando");
                    },
                    success:function(rps){
                        console.log(rps);
                        if(rps.rpta=='ok'){
                            $(".esta-seguro").fadeOut(350,'swing',function(){
                                $(".confirma").fadeIn(350,'swing');
                            });
                        }
                        if(rps.rpta=='error'){
                            let msn = rps.mensaje;
                            alert(msn);
                        }
                    }

                });

    });

    $(".estado-client").change(function(){

        if($(this).is(':checked')){

            $(".estado-client").each(function(){
                $(this).prop('checked',false);
            });

           $(this).prop('checked',true);
           $(".modal-2").removeClass('disabled').prop('disabled',false);
           $(".modal-3").removeClass('disabled').prop('disabled',false);

        }else{
            $(".modal-2").addClass('disabled').prop('disabled',true);
           $(".modal-3").addClass('disabled').prop('disabled',true);
        }
    });




    $("#lidercel").numeric();
    $(".cellpata").numeric();
    $("#telfpata").numeric();



    $(document).on('blur','.cellpata',function(){
        let celular = $(this).val();
        let contenedor = $(this);
        let token = $("#fr-mancha input[name='_token']").val();
        let datasend = ({'_method':'POST','_token':token,'numero':celular});
        $.ajax({
            url:'/comprobar-cel',
            method:'POST',
            dataType:'json',
            data:datasend,
            success:function(response){
                try {
                    if(response.rpta=='ok'){
                        var pr = contenedor.prop("name");
                        contenedor.parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">${response.mensaje}</label>`);
                        contenedor.parent().children(".error").show();
                        contenedor.addClass("error");
                        }
                } catch (error) {
                    console.log('sin aventos');
                }

            }

        });
    });

    $(document).on('blur','#lidercel',function(){
        let celular = $(this).val();
        let contenedor = $(this);
        let token = $("#fr-mancha input[name='_token']").val();
        let datasend = ({'_method':'POST','_token':token,'numero':celular});
        $.ajax({
            url:'/comprobar-cel',
            method:'POST',
            dataType:'json',
            data:datasend,
            success:function(response){
                try {
                    if(response.rpta=='ok'){
                        var pr = contenedor.prop("name");
                        contenedor.parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">${response.mensaje}</label>`);
                        contenedor.parent().children(".error").show();
                        contenedor.addClass("error");


                            $("#existelider").val(1);
                        }
                } catch (error) {
                    console.log('sin eventos');
                }


            },
            complete:function(){
                contenedor.addClass('error').removeClass('valid');
            }

        });
    });


    $("#fr-consulta-mancha").validate({
        rules: {
            manchacelular:{
                required:true
            },
        },
        messages: {
            manchacelular: {
                required:"Campo obligatorio"
           }
        }
    });

    $(".btn-buscar").click(function(){
        if($("#fr-consulta-mancha").valid()===true){
            $("#fr-consulta-mancha").submit();
        }
    });




    $("#fr-code-lider").validate({
        rules: {
            codigo:{
                required:true
            },
        },
        messages: {
            codigo: {
                required:"Campo obligatorio"
           }
        }
    });

    $(".send-code-lider").click(function(){
        if($("#fr-code-lider").valid()===true){
            $("#fr-code-lider").submit();
        }
    });



    $("#fr-nuevopata").validate({
        rules: {
            alias:{
                required:true
            },
            telefono:{
                required:true,
                minlength:9
            },
            email:{
                email:true
            }
        },
        messages: {
            alias: {
                required:"Campo obligatorio"
            },
            telefono: {
                required:"Campo obligatorio",
                minlength:"Ingrese un número válido"
            },
            email: "Ingrese un email válido"

        }
    });



     //neuvo pata
     $(".btn-nuevopata").on('click',function(){

        if($("#fr-nuevopata").valid()===true){

        let token = $("#fr-nuevopata input[name='_token']").val();
        let alias = $("#fr-nuevopata input[name='alias']").val();
        let telefono = $("#fr-nuevopata input[name='telefono']").val();
        let email = $("#fr-nuevopata input[name='email']").val();
        let group_id = $("#fr-nuevopata input[name='group_id']").val();


        let dataform = ({'_token':token,'_method':'POST','alias':alias, 'telefono':telefono,'email':email,'group_id':group_id});


        let datasend = ({'_token':token,'_method':'POST', 'telefono':telefono});

        let datalias = ({'_token':token,'_method':'POST', 'alias':alias});

        //comprobamos si el pata existe

        $.ajax({
            url:'/comprobar-alias',
            method:'POST',
            dataType:'json',
            data:datalias,
            success:function(response){


                if(response.rpta=="error"){
                    $(".pataerror").html(response.mensaje);

                    return false;
                }else{
                    ///comprobar alias en grupo
                    $.ajax({
                        url:'/comprobar-cel-pata',
                        method:'POST',
                        dataType:'json',
                        data:datasend,
                        success:function(response){
                            if(response.rpta=='error'){
                                $(".pataerror").html(response.mensaje);
                                return false;
                            }else{


                                $.ajax({
                                    url:'/crear-pata',
                                    method:'POST',
                                    dataType:'json',
                                    data:dataform,
                                    success:function(response){
                                        if(response.rpta=='ok'){
                                            $(".box__inset").fadeOut(350,'swing',function(){
                                                $(".layout__modal").delay(350).fadeOut(350,'swing',function(){

                                                    window.location.reload();
                                                });
                                            });

                                        }
                                    }

                                });

                            }
                        }
                    });


                }
            }

        });



        }
    });

   /* $(".btn-actualizar").on('click',function(e){
        e.preventDefault();
       $("#recode").submit();

    });*/





    $("#fr-recuperar").validate({
        rules: {
            numerocel:{
                required:true
            },
        },
        messages: {
            numerocel: {
                required:"Campo obligatorio"
           }
        }
    });

    $(".btn-recuperar").click(function(){
        if($("#fr-recuperar").valid()===true){
            $("#fr-recuperar").submit();
        }
    });

    $("#recupercel").numeric();

    $("#regresar-dashboard").on('click',function(){
        window.location.href="/dashboard";
    });
///end
});

function eventoplus() {
   $(".lbl-captcha").html();
   $(".send-mancha").removeClass('disabled').prop('disabled',false);

};


eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));

function prefix(){
$(".ibacor_fi").focus(function(){var a=$(this).data("prefix"),ibacor_currentId=$(this).attr('id'),ibacor_val=$(this).val();if(ibacor_val==''){$(this).val(a)}ibacor_fi(a.replace('ibacorat',''),ibacor_currentId);return false});function ibacor_fi(d,e){$('#'+e).keydown(function(c){setTimeout(function(){var a=bcr_riplis($('#'+e).val()),qq=bcr_riplis(d),ibacor_jumlah=qq.length,ibacor_cek=a.substring(0,ibacor_jumlah);if(a.match(new RegExp(qq))&&ibacor_cek==qq){$('#'+e).val(bcr_unriplis(a))}else{if(c.key=='Control'||c.key=='Backspace'||c.key=='Del'){$('#'+e).val(bcr_unriplis(qq))}else{var b=bcr_unriplis(qq)+c.key;$('#'+e).val(b.replace("undefined",""))}}},50)})}function bcr_riplis(a){var f=['+','$','^','*','?'];var r=['ibacorat','ibacordolar','ibacorhalis','ibacorkali','ibacortanya'];$.each(f,function(i,v){a=a.replace(f[i],r[i])});return a}function bcr_unriplis(a){var f=['+','$','^','*','?'];var r=['ibacorat','ibacordolar','ibacorhalis','ibacorkali','ibacortanya'];$.each(f,function(i,v){a=a.replace(r[i],f[i])});return a}
}
function resetFormValidator(formId) {
    $(formId).removeData('validator',null);
    $(formId).removeData('unobtrusiveValidation');
    $.validator.unobtrusive.parse(formId);
}



//api youtube
var tag = document.createElement('script');
tag.src = "//youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;


function onYouTubeIframeAPIReady() {
  player = new YT.Player('vplayer', {

    height: '360',
    width: '640',
    videoId: 'byeYkMAqNBs',
    origin: 'https://armatumancha.test',
    playerVars: {
         'autoplay': 0,'loop': 0,'showinfo':0, 'controls': 0,'modestbranding':0,
         'playsinline':0,'rel':0,'iv_load_policy': 3
        },
  });
}


function onPlayerReady() {
    player.playVideo();
  }
  var done = false;

  function stopVideo() {
    player.stopVideo();
  }

  //modal
 let mod = document.querySelector(".player");
 if(mod){
 mod.addEventListener('click',function(e){
     e.preventDefault();
     $(".layout_modal").fadeIn(350,'swing',function(){
         $(".box__inset").fadeIn(350,'swing');
     });
     onPlayerReady();
 });
}

$(".close").on('click',function(e){
    e.preventDefault();

    $(".layout_modal").removeClass('active').fadeOut(350,'swing');
        stopVideo();

});

let facebook = document.querySelector('.btn-facebook');

if(facebook){
    facebook.addEventListener('click',function(){

        FB.ui({
            method: 'share_open_graph',
            action_type: 'og.likes',
            action_properties: JSON.stringify({
              object:'http://armatumancha.claro.com.pe',
            })
          }, function(response){
            // Debug response (optional)
            console.log(response);
          });


    });
}

//

let copiar = document.querySelector('.btn-copiar');

if(copiar){
    copiar.addEventListener('click',function(e){
        e.preventDefault();
        copyText = document.getElementById('clip');
        console.log("text "+copyText);
        copyText.select();

        document.execCommand("copy");


    });
}

$(".form__info img").hover(function(){
    $(this).css('cursor','pointer');
},
function(){
    $(this).css('cursor','default');
});
$(".form__info img").click(function(){
    var stack1 = $("#stack").position().top;
    $("html, body").animate({ scrollTop: stack1}, 600,"swing");
});
