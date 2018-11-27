//metodos globales


//eventos first mobile
$(document).ready(function(){
    "use strict";
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
                        contenedor.after(`<span class="error"> Nombre de mancha ya utilizado </span>`);
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
            .css({'max-height':3500})
            .animate({'max-height':0},350,'swing');
            $(this).parent('div').removeClass("active");
          }else{
            $(this).parent('div').addClass("active");
            $(this).parent('div').parent('div').children('.considerations__data')
            .css({'max-height':0})
            .animate({'max-height':3500},350,'swing');
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
              <input name="alias[]" class="form__text2 aliaspata" type="text" maxlength="20" id="alias${c}" placeholder="Alias" />
            </dt>
            <dd></dd>
          </dl>
          <dl>
            <dt>

            <input class="form__text2  cellpata" maxlength="9"   name="telefono[]" type="text" id="cellpata${c}"  placeholder="Teléfono" />

              <dd></dd>
            </dt>
          </dl>
          <dl>
            <dt>
              <input class="form__text2"  name="email[]" type="text" id="email${c}" placeholder="Email (opcional)" />
            </dt>
            <dd></dd>
          </dl>
        </div>
      </div>`;

      $(".listado").append(pata);
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

   validacion();


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

   /* $(document).on('blur',".aliaspata",function(){

        var valor = $(this).val();
        $(".cellpata").each(function(){
           if($(this).val()==valor){
            var pr = $(this).prop("name");
            $(this).parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">Alias ya utilizado</label>`);
            $(this).parent().children(".error").show();
            $(this).addClass("error");
              return false;
           }
        });
    });*/

    $(document).on('focusin',".cellpata",function(){
        $(this).parent().children('label').remove();

    });

    $(document).on('focusin',".aliaspata",function(){
        $(this).parent().children('label').remove();

    });
    $(document).on('focusin',"#lidercel",function(){
        $(this).parent().children('label').remove();
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

    $(document).on('click','.send-mancha',function(){
        if($("#autorizar").is(':checked')){
        }else{
            $(".lbl-autorizar").html("*Campo obligatorio");
        }

        $(".cellpata").each(function(){
            $(".cellpata").parent().children('label').remove();
            if($(this).val()==""){
                var pr = $(this).prop("name");
                $(this).parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">Campo Obligatorio</label>`);
                $(this).parent().children(".error").show();
                $(this).addClass("error");
            }

        });
        $(".aliaspata").each(function(){
            $(".aliaspata").parent().children('label').remove();
            if($(this).val()==""){
                var pr = $(this).prop("name");
                $(this).parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">Campo Obligatorio</label>`);
                $(this).parent().children(".error").show();
                $(this).addClass("error");
            }
        });
        if($("#fr-mancha").valid()===true){
            //duplicados pata
            var recipientsArray = numpatas.sort();

            var reportRecipientsDuplicate = [];
            for (var i = 0; i < recipientsArray.length - 1; i++) {
                if (recipientsArray[i + 1] == recipientsArray[i]) {
                    reportRecipientsDuplicate.push(recipientsArray[i]);
                }
            }
            if(reportRecipientsDuplicate.length>0){
                alert("tiene numeros duplicados");
                $(".cellpata").addClass('activo-cellpata');
                return false;
            }
            //duplaicados cellpata

            var recipientsArray2 = nompata.sort();

            var reportRecipientsDuplicate2 = [];
            for (var i = 0; i < recipientsArray2.length - 1; i++) {
                if (recipientsArray2[i + 1] == recipientsArray2[i]) {
                    reportRecipientsDuplicate2.push(recipientsArray[i]);
                }
            }
            if(reportRecipientsDuplicate2.length>0){
                alert("tiene alias duplicados");
                $(".aliaspata").addClass('activo-aliaspata');
                return false;
            }

            if($("#autorizar").is(':checked')){

            }else{
                $(".lbl-autorizar").html("*Campo obligatorio");
                return false;
            }


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
                alert("Este numero de lider esta registrado en otro grupo.");

                return false;

            }else{


                $("#fr-mancha").submit();
            }


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

                let dataform = ({'_token':token,'_method':'POST','user_id':id, 'lider_id':liderid});

                $.ajax({
                    url:'/asignar-lidermancha',
                    method:'POST',
                    dataType:'json',
                    data:dataform,
                    success:function(response){
                        console.log(response);
                        if(response.rpta=='ok'){
                            alert(response.mensaje);
                        }
                        if(response.rpta=='error'){
                            let msn = response.mensaje;
                            alert(msn);
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
                var pr = contenedor.prop("name");
                contenedor.parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">${response.mensaje}</label>`);
                contenedor.parent().children(".error").show();
                contenedor.addClass("error");




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
                var pr = contenedor.prop("name");
                contenedor.parent().append(`<label id="${pr}-error" class="error" for="${pr}" style="display:block;">${response.mensaje}</label>`);
                contenedor.parent().children(".error").show();
                contenedor.addClass("error");


                    $("#existelider").val(1);


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
    });

    $(".btn-actualizar").on('click',function(){
        window.location.reload();
    });





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
///end
});

function eventoplus() {
   $(".lbl-captcha").html();
   $(".send-mancha").removeClass('disabled').prop('disabled',false);

};

function validacion(){
    $("#fr-mancha").validate({

        rules: {
            ignore: [],
            nombres:{
                required:true,
                maxlength:15
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
            nombres: {
                required:"Ingresa el nombre de tu mancha",
                maxlength:"Máximo 15 caracteres"
            },
            lidername: "Ingrese su alias de lider",
            lidercel:{
                 required:"Ingrese su número de celular",
                 minlength:"Ingresa un número celular válido"
            },
            lidermail: "Ingrese un email válido",
            'alias[]':{
                required:"Completar Alias",
                maxlength:"Máximo 20 caracteres"
            },
            'telefono[]':{
                required:"Ingrese su número de celular",
                 minlength:"Ingresa un número celular válido"
            }



        }
    });


}
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));

function prefix(){
$(".ibacor_fi").focus(function(){var a=$(this).data("prefix"),ibacor_currentId=$(this).attr('id'),ibacor_val=$(this).val();if(ibacor_val==''){$(this).val(a)}ibacor_fi(a.replace('ibacorat',''),ibacor_currentId);return false});function ibacor_fi(d,e){$('#'+e).keydown(function(c){setTimeout(function(){var a=bcr_riplis($('#'+e).val()),qq=bcr_riplis(d),ibacor_jumlah=qq.length,ibacor_cek=a.substring(0,ibacor_jumlah);if(a.match(new RegExp(qq))&&ibacor_cek==qq){$('#'+e).val(bcr_unriplis(a))}else{if(c.key=='Control'||c.key=='Backspace'||c.key=='Del'){$('#'+e).val(bcr_unriplis(qq))}else{var b=bcr_unriplis(qq)+c.key;$('#'+e).val(b.replace("undefined",""))}}},50)})}function bcr_riplis(a){var f=['+','$','^','*','?'];var r=['ibacorat','ibacordolar','ibacorhalis','ibacorkali','ibacortanya'];$.each(f,function(i,v){a=a.replace(f[i],r[i])});return a}function bcr_unriplis(a){var f=['+','$','^','*','?'];var r=['ibacorat','ibacordolar','ibacorhalis','ibacorkali','ibacortanya'];$.each(f,function(i,v){a=a.replace(r[i],f[i])});return a}
}
function resetFormValidator(formId) {
    $(formId).removeData('validator',null);
    $(formId).removeData('unobtrusiveValidation');
    $.validator.unobtrusive.parse(formId);
}
