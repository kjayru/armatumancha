//metodos globales


//eventos first mobile
$(document).ready(function(){
    "use strict";


    $("#nombres").on('blur',function(){
        var valor = $(this).val();


        var token = $("#fr-data input[name='_token']").val();

         var sendata = {'_token':token,'_method':'POST','nombres':valor};
        $.ajax({
            url:'/disponibilidad-mancha',
            type:'POST',
            data:sendata,
            dataType:'json',
            success:function(response){
                if(response.rpta == 'existe'){
                    alert("El nombre del grupo existe, escoja otro nombre");
                }else{
                    alert("El nombre del grupo esta disponible");
                }

            }
        });
    });

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
              <input name="alias[]" class="form__text2" type="text" maxlength="20" placeholder="Alias" />
            </dt>
            <dd></dd>
          </dl>
          <dl>
            <dt>
              <input class="form__text2 cellpata" maxlength="9"  name="telefono[]" type="text" placeholder="Teléfono" />
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
      $(".cellpata").numeric();
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
            autorizar:{
                required:true
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
            autorizar: "*Marque esta casilla",
            'alias[]': "*Ingrese el alias de su pata",
            'telefono[]': "*Ingrese el número de celular"


        }
    });

    $("#Autorizar").change(function(){
        if($("#Autorizar").is(':checked')){
            $(".lbl-autorizar").html("");
        }
    });
    $(document).on('click','.send-mancha',function(){
        if($("#fr-mancha").valid()===true){

           if($("#Autorizar").is(':checked')){

            }else{
                $(".lbl-autorizar").html("*Campo obligatorio");
                return false;
            }
            var response = grecaptcha.getResponse();

            if(response.length == 0){

                $(".lbl-captcha").html("Validación obligatoria");
                return false;
            }

            $("#fr-mancha").submit();
        }else{

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
           $(".modal-2").removeClass('disabled').prop('disabled',false);
           $(".modal-3").removeClass('disabled').prop('disabled',false);

        }else{
            $(".modal-2").addClass('disabled').prop('disabled',true);
           $(".modal-3").addClass('disabled').prop('disabled',true);
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

    $(".btn-actualizar").on('click',function(){
        window.location.reload();
    });

    $("#lidercel").numeric();
    $(".cellpata").numeric();
});

function eventoplus() {
   $(".lbl-captcha").html();
   $(".send-mancha").removeClass('disabled').prop('disabled',false);

};

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));
