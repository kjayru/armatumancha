//metodos globales


//eventos first mobile
$(document).ready(function(){
    "use strict";


    let slick1 = $("#list1").slick({
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

    let slick2 = $("#list2").slick({
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

    let slick3 = $("#list3").slick({
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


      $(".considerations__subtitle a").on('click',function(e){
          e.preventDefault();

          if( $(this).parent('div').hasClass('active')){

            $(this).parent('div').parent('div').children('.considerations__data')
            .css({'max-height':657})
            .animate({'max-height':0},350,'swing');
            $(this).parent('div').removeClass("active");
          }else{
            $(this).parent('div').addClass("active");
            $(this).parent('div').parent('div').children('.considerations__data')
            .css({'max-height':0})
            .animate({'max-height':467},350,'swing');
          }


      });

      let c = 1;
      $(".add-pata").on('click',function(e){

        c += 1;

        if(c<10){

        let pata =  `<div class="form__members">
        <div class="form__fields ">
          <div class="form__fields--title">
            <h3>Miembro # <span>${c}</span></h3>
          </div>
          <dl>
            <dt>
              <input name="alias[]" class="form__text2" type="text" placeholder="Alias" />
            </dt>
            <dd></dd>
          </dl>
          <dl>
            <dt>
              <input class="form__text2" name="telefono[]" type="text" placeholder="Teléfono" />
              <dd></dd>
            </dt>
          </dl>
          <dl>
            <dt>
              <input class="form__text2"  name="email[]" type="text" placeholder="Email (opcional)" />
            </dt>
            <dd></dd>
          </dl>
        </div>
      </div>`;

      $(".listado").append(pata);
        }else{
            alert("completo su maxima lista de amigos");
        }
      });


//validate
$.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /[a-z0-9]+@[a-z0-9]+\.[a-z]+/.test( value );
  };
  $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
   }, "Valor no es igual");


    $("#fr-mancha").validate({
        rules: {
            nombres:{
                required:true,
            },
            lidername:{
                required:true,
            },
            lidercel:{
                required:true,
            },
            'alias[]':{
                required:true,
            },
            'telefono[]':{
                required:true,
            }


        },
        messages: {
            nombres: "*Ingrese el nombre de su mancha",
            lidername: "*Ingrese su alias de lider",
            lidercel: "*Ingrese su número de celular",
            'alias[]':"*Ingrese el alias de su pata",
            'telefono[]':"*Ingrese el número de celular"

        }
    });

    $(document).on('click','.send-mancha',function(){
        if($("#fr-mancha").valid()===true){
            $("#fr-mancha").submit();
        }else{
            alert('complete el form');
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

                if(id===liderid){
                    alert("Ya eres lider esta acción no procede");
                    return false;
                }
                let token = $("#fordata input[name='_token']").val();

                let dataform = ({'_token':token,'_method':'PUT','user_id':id, 'lider_id':liderid});
                $.ajax({
                    url:'/asignar-lider/'+id,
                    method:'POST',
                    dataType:'json',
                    data:dataform,
                    success:function(response){
                        if(response.rpta=='ok'){
                            window.location.reload();
                        }
                    }

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

                if(id===liderid){
                    alert("esta acción no procede");
                    return false;
                }
                let token = $("#fordata input[name='_token']").val();

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

                });
            }


        });

        if($(".estado-client").is(':checked')){

        }else{
            alert("Marque una casilla, para activar este proceso");
            return false;
        }
    });

    $(".page1__close").on('click',function(e){
        e.preventDefault();
        $(".box__inset").fadeOut(350,'swing',function(){
            $(".layout__modal").delay(350).fadeOut(350,'swing',function(){
                $(".page1").fadeOut(350);
            });
        });
    });


    $(".estado-client").change(function(){

        if($(this).is(':checked')){

            $(".estado-client").each(function(){
                $(this).prop('checked',false);
            });

           $(this).prop('checked',true);
        }
    });


    //neuvo pata
    $(".btn-nuevopata").on('click',function(){
        let token = $("#fr-nuevopata input[name='_token']").val();
        let alias = $("#fr-nuevopata input[name='alias']").val();
        let telefono = $("#fr-nuevopata input[name='telefono']").val();
        let email = $("#fr-nuevopata input[name='email']").val();
        let group_id = $("#fr-nuevopata input[name='group_id']").val();


        let dataform = ({'_token':token,'_method':'POST','alias':alias, 'telefono':telefono,'email':email,'group_id':group_id});
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


    });

});
