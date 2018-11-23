@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

               <!-- <div class="card-body">
                     <form action="#" id="fr-data">
                         @csrf
                        <input type="text" id="mancha" name="nombres" placeholder="mancha">
                     </form>
                </div>-->
            </div>

    <div class="card">
            <form class="form"  method="POST" id="fr-data" >
                    <input type="hidden" name="_method" value="POST">

                    <input type="hidden" name="beneficio" id="beneficio" value="gigas">
                    @csrf

                    <section class="section2">
                        <div class="section2__align">
                        <div class="section2__main">
                            <div class="register">
                            <!--form.form(action="")-->
                            <div class="form">
                                <div class="form__row1">
                                <div class="form__label">
                                    <div class="circle">
                                    <div class="circle__inner">
                                        <div class="circle__wrapper">
                                        <div class="circle__content">1</div>
                                        </div>
                                    </div>
                                    </div>
                                    <label>Nombre de la Mancha</label>
                                </div>
                                <div class="form__fields">
                                    <dl class="type1">
                                    <dt>
                                        <input class="form__text1" type="text" id="nombres" name="nombres" v-model="register.nombres" v-validate="'required|string|min:3|norepeat1'"/>
                                    </dt>

                                    </dl>
                                </div>
                                </div>
                                <div class="form__row1">
                                <div class="form__label">
                                    <div class="circle">
                                    <div class="circle__inner">
                                        <div class="circle__wrapper">
                                        <div class="circle__content">2</div>
                                        </div>
                                    </div>
                                    </div>
                                    <label class="lider">Ingresa tus datos (líder)</label>
                                </div>
                                <div class="form__fields">
                                    <dl>
                                    <dt>
                                        <input class="form__text2" type="text" name="alias" v-model="register.alias" v-validate="'required|string|min:3'" placeholder="Alias"/>
                                    </dt>

                                    </dl>
                                    <dl>
                                    <dt>
                                        <input class="form__text2" type="text" name="telefono" v-model="register.telefono" v-validate="'numeric|required|min:9|max:9'" placeholder="Teléfono"/>
                                    </dt>

                                    </dl>
                                    <dl>
                                    <dt>
                                        <input class="form__text2" type="text" name="email" v-model="register.email" v-validate="'required|min:3|email'" placeholder="Email (opcional)"/>
                                    </dt>

                                    </dl>
                                </div>
                                </div>
                                <div class="form__row1">
                                <div class="form__label">
                                    <div class="circle">
                                    <div class="circle__inner">
                                        <div class="circle__wrapper">
                                        <div class="circle__content">3</div>
                                        </div>
                                    </div>
                                    </div>
                                    <label>Agrega tu mancha</label>
                                </div>
                                <div class="form__members">

                                    <div class="form__fields--title">
                                        <h3>Miembro # 1</h3>
                                    </div>
                                    <dl>
                                        <dt>
                                        <input class="form__text2" type="text" placeholder="Alias" :key="'alias_'+index" :name="'alias_'+index" v-model="group[0].alias" v-validate="'required|min:3|norepeat2'"/>
                                        </dt>
                                    </dl>
                                    <dl>
                                        <dt>
                                        <input class="form__text2" type="text" placeholder="Teléfono" :key="'telefono_'+index" :name="'telefono_'+index" v-model="group[0].telefono" v-validate="'numeric|required|min:9|max:9'"/>

                                        </dt>
                                    </dl>
                                    <dl>
                                        <dt>
                                        <input class="form__text2" type="text" placeholder="Email (opcional)" :key="'email_'+index" :name="'email_'+index" v-model="group[0].email" v-validate="'required|min:3|email'"/>
                                        </dt>    </dl>
                                    </div>
                                </div>
                                </div>
                                <div class="form__row2">
                                <div class="form__buttons">
                                    <button class="button1" type="button" v-on:click="addMember()"><i>+ </i>Agregar otro participante </button>
                                </div>
                                </div>
                                <div class="form__row1">
                                <div class="form__info">
                                    <p>Recuerda que el máximo de miembros por mancha es de 10 patas. </p>
                                </div>
                                </div>
                                <div class="form__row1">
                                <div class="form__fields">
                                    <dl class="type2">
                                    <dt>
                                        <div class="form__checkbox1">
                                        <input type="checkbox" name="autorizar" v-model="register.autorizar" v-validate="'required'" id="Autorizar"/>
                                        <label for="Autorizar"></label><span>Autorizo a Claro para el envío de contenido publicitario. </span>
                                        </div>
                                    </dt>
                                  </dl>
                                </div>
                                </div>

                                <div class="form__row3">
                                <div class="form__buttons">
                                    <button class="button2" type="button" id="send-register">Registrar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </section>
                    </form>
    </div>
        </div>
    </div>
</div>
<script>


    $("#mancha").on('blur',function(){
        var valor = $(this).val();


        var token = $("#fr-data input[name='_token']").val();

         var sendata = {'_token':token,'_method':'POST','nombres':valor};
        $.ajax({
            url:'/disponibilidad-mancha',
            type:'POST',
            data:sendata,
            dataType:'json',
            success:function(response){
                console.log(response);
            }
        });
    });


    $("#send-register").on('click',function(e){
        e.preventDefault();

        var token = $("#fr-data input[name='_token']").val();
        var nombres = $("#fr-data input[name='nombres']").val();
        var alias = $("#fr-data input[name='alias']").val();
        var telefono = $("#fr-data input[name='telefono']").val();
        var email = $("#fr-data input[name='email']").val();
        var autorizar = $("#fr-data input[name='autorizar']").val();



        var sendata = {'beneficio':'gigas','_method':'POST','_token':token,'nombres':nombres,'alias':alias,'telefono':telefono,'email':email,'autorizar':autorizar};
        $.ajax({
            url:'/save-data-group',
            type:'POST',
            data:sendata,

            dataType:'json',
            success:function(response){
                console.log(response);
            }
        });
    });
</script>
@endsection
