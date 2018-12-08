
@extends('layout.master')
@section('content')


<div class="layout__main">
    <div class="page2">
      <div class="page2__main">
        <form class="form" id="fr-data" >
            @csrf
    </form>

  <form class="form" method="POST" id="fr-mancha" action="{{ route('register') }}" >
         @method('POST')
         @csrf

            <input type="hidden" name="existepata" id="existepata" value="">
            <input type="hidden" name="existelider" id="existelider" value="">
            <input type="hidden" name="existemancha" id="existemancha" value="">
          <section class="section1">
            <div class="section1__align">
              <div class="section1__header">
                <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver </span></a></div>
                <div class="title">
                  <h2 class="t1">¡Arma tu mancha y gana!</h2>
                </div>
              </div>
              </div>
            </section>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <section class="section2" id="formu_register">
              <div class="section2__align">
                <div class="section2__main">
                  <div class="register">
                    <!--form.form(action="")-->
                    <div class="form">
                      <div id="summary"></div>
                      <div class="listado">
                          <div class="form__row1">
                          <div class="form__label">
                            <div class="circle">
                              <div class="circle__inner">
                                <div class="circle__wrapper">
                                  <div class="circle__content">1</div>
                                </div>
                              </div>
                            </div>
                            <label>Elige el bono</label>
                          </div>
                          <div class="form__fields">
                            <dl class="type3">
                                <dt>
                                <div class="form__radio1">
                                  <input type="radio" name="beneficio" value="bonos" id="gigas" onclick="gtag('event', 'Eleccion', {  'event_category' : 'Registro',  'event_label' : 'Gigas'});" />
                                  <label for="gigas"><figure><img src="/assets/pg2_icon_gigas2.svg" alt=""/></figure><span>Bono de Gigas</span></label>
                                </div>
                                <div class="form__radio1">
                                  <input type="radio" name="beneficio" value="latam" id="latam" onclick="gtag('event', 'Eleccion', {  'event_category' : 'Registro',  'event_label' : 'Millas'});" />
                                  <label for="latam" ><figure><img src="/assets/pg2_icon_latam2.svg" alt=""/></figure><span>Bono de Millas LATAM Pass</span></label>
                                </div>
                                </dt>
                                <dd><span class="form__error"></span></dd>
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
                            <label>Nombre de la mancha</label>
                          </div>
                          <div class="form__fields">
                            <dl class="type1">
                              <dt>
                              <input class="form__text1 unique"  type="text" id="nombres" name="name" value="{{ old('name') }}" />
                              </dt>
                              <dd><span class="form__error" ></span>
                              </dd>
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
                            <label class="lider">Ingresa tus datos (líder)</label>
                          </div>
                          <div class="form__fields">
                            <dl>
                              <dt>
                              <input class="form__text2 unique" type="text"  name="lidername" id="lidername" value="{{ old('lidername') }}" maxlength="20"  placeholder="Alias"/>
                              </dt>
                              <dd><span class="form__error" ></span></dd>
                            </dl>
                            <dl>
                              <dt>
                              <input class="form__text2 unique" type="text"   name="lidercel" id="lidercel" maxlength="9" value="{{ old('lidercel') }}"   placeholder="Teléfono"/>
                              </dt>
                              <dd><span class="form__error" ></span></dd>
                            </dl>
                            <dl>
                              <dt>
                              <input class="form__text2" type="email"  name="lideremail" value="{{ old('lideremail') }}"   placeholder="Email (opcional)"/>
                              </dt>
                              <dd><span class="form__error" ></span></dd>
                            </dl>
                          </div>
                        </div>
                        <div class="form__row1">
                          <div class="form__label">
                            <div class="circle">
                              <div class="circle__inner">
                                <div class="circle__wrapper">
                                  <div class="circle__content">4</div>
                                </div>
                              </div>
                            </div>
                            <label>Agrega tu mancha</label>
                          </div>
                          <div class="form__members">
                            <div class="form__fields form__fieldsNO">
                              <div class="form__fields--title">
                                <h3>Miembro # <span>1</span></h3>
                              </div>
                              <dl>
                                <dt>
                                <input name="alias[]" class="form__text2  aliaspata"  type="text"  maxlength="20" value=""  placeholder="Alias" />
                                </dt>
                                <dd><span class="form__error" ></span></dd>
                              </dl>
                              <dl>
                                <dt>
                                <input class="form__text2   cellpata" maxlength="9"    name="telefono[]" type="text" value=""  placeholder="Teléfono" />
                                </dt>
                                <dd><span class="form__error" ></span></dd>
                              </dl>
                              <dl>
                                <dt>
                                <input class="form__text2 "  name="email[]" type="email" value=""  placeholder="Email (opcional)" />
                                </dt>
                                <dd><span class="form__error" ></span></dd>
                              </dl>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form__row2">
                        <div class="form__buttons">
                          <button class="button1 add-pata" type="button" onclick="gtag('event', 'Añadir', {  'event_category' : 'Registro',  'event_label' : 'agregar-participante'});"><i>+ </i>Agregar otro miembro </button>
                        </div>
                      </div>
                      <div class="form__row1">
                        <div class="form__info">
                          <p>Recuerda que el máximo de miembros por mancha es de 10. </p>
                          <span>El Bono de GB se entregará durante 12 periodos consecutivos y dependerá de la cantidad de miembros que cumplan las condiciones.</span>
                          <span>Las Millas LATAM Pass será entregados a los socios activos de LATAM Pass y dependerá de la cantidad de miembros que cumplan las condiciones.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <div class="section2__align2">
                <div class="section2__main">
                  <div class="register">
                    <!--form.form(action="")-->
                    <div class="form">
                      <div id="summary"></div>
                      <div class="listado">
                          <div class="form__row_group">

                              <div class="form__row4">
                                <div class="form__fields form__fieldsNO">
                                  <dl class="type2">
                                    <dt>
                                    <div class="form__checkbox1">
                                      <input type="checkbox" name="autorizar"  id="autorizar"/>
                                      <label for="autorizar" id="lbl-autoriza"></label><span>Con mi registro, autorizo a CLARO para enviarme información sobre esta promoción<br> y otra publicidad de Claro a la línea registrada como parte de la mancha.</span>
                                    </div>
                                    </dt>
                                    <dd><span class="lbl-autorizar form__error" ></span></dd>
                                  </dl>
                                </div>
                              </div>
                              <div class="form__row3">
                                <div class="form__buttons" style="text-align: center;">
                                  <div class="g-recaptcha" data-callback="eventoplus" data-sitekey="6LfX1HwUAAAAAOaSaOP8bhE_IBKPUMpdzvf6ZI19"></div>
                                  <span class="lbl-captcha form__error" ></span>
                                </div>
                              </div>
                              <div class="form__row3">
                                <div class="form__buttons">
                                  <button class="button2 send-mancha " type="button" onclick="gtag('event', 'Exitoso', {  'event_category' : 'Registro',  'event_label' : 'registrar'});">Registrar</button>
                                </div>
                              </div>
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
                  <style>
                  .g-recaptcha {
                      display: inline-block;
                  }
                  .buton1{
                      outline:none;
                  }
                  .form__buttons {
                      position: relative;
                  }
                  span.lbl-captcha.form__error {
                      position: absolute;
                      bottom: -16px;
                      left: 0;
                      display: block;
                      width: 100%;
                  }
                  .disabled{
                      opacity: 0.3;
                  }
                  .error2{
                    color: red;
                    font-size: 12px;
                    display: block;
                    max-width: 90%;
                  }
                  </style>
@endsection
