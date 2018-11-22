let generico = document.querySelectorAll('.btn-generico');
$(document).ready(function(){
    $(".btn-generico").click(function(e){

        $(".btn-generico").removeClass('activado');
        $(this).addClass('activado');

    });

    $(".btn-generico2").click(function(e){

        $(".btn-generico2").removeClass('activado');
        $(this).addClass('activado');

        let valor = $(this).data('value');
        $("#beneficio").val(valor);

    });

    $(".btn-send-grupo").on('click',function(e){
        e.preventDefault();
        let formdata = $("#fr-mancha").serialize();

        console.log(formdata);
        $.ajax({
            url:'/save-data-user',
            type:'POST',
            data:formdata,
            dataType: 'json',
            success:function(response){

                    let datajson = response.data;


                        $.ajax({
                            url:'http://api-armatumancha.claro.com.pe/set-sms/run',
                            type:'POST',
                            data:datajson,
                            dataType:'json',
                            success:function(response){
                                console.log(response);
                                debugger
                            }
                        });


            }

        });


    });
});
