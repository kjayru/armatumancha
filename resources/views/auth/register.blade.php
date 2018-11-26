
@extends('layout.master')
@section('content')

                    <div class="layout__main">
                            <div class="page2">
                              <div class="page2__main">


                              <form class="form" id="fr-data" >
                                      @csrf
                              </form>

                            <form class="form" method="POST" id="fr-mancha" action="{{ route('register') }}" >

                                  @csrf


                                  <section class="section1">
                                          <div class="section1__align">
                                            <div class="section1__header">
                                              <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver </span></a></div>
                                              <div class="title">
                                                <h2>¡Arma tu mancha!</h2>
                                              </div>
                                            </div>
                                            <div class="section1__main">
                                              <div class="title">
                                                <h2>Elige el beneficio</h2>
                                              </div>
                                              <div class="content">
                                                <input class="content__radio" id="gigas" type="radio" value="bonos" checked="checked" name="beneficio" v-model="register.beneficio" v-validate="'required'"/>
                                                <label class="content__item" for="gigas">
                                                  <div class="content__bg">
                                                    <blockquote>
                                                      <figure><img src="assets/pg2_icon_gigas.svg" alt=""/></figure>
                                                      <figcaption>
                                                        <h4>Bono de gigas</h4>
                                                      </figcaption>
                                                      <div class="tooltip"><i><span>El bono de GB se entregará durante 12 meses consecutivos y dependerá de la cantidad de miembros que cumplan las condiciones.</span></i></div>
                                                    </blockquote>
                                                    <div class="content__info">
                                                      <p>Acabas de seleccionar el beneficio de bono de gigas para ti y tu mancha.</p>
                                                    </div>
                                                  </div>
                                                </label>
                                                <input class="content__radio" id="latam" type="radio" value="latam" name="beneficio" v-model="register.beneficio" v-validate="'required'"/>
                                                <label class="content__item" for="latam">
                                                  <div class="content__bg">
                                                    <blockquote>
                                                      <figure><img src="assets/pg2_icon_latam.svg" alt=""/></figure>
                                                      <figcaption>
                                                        <h4>Millas LATAM Pass </h4>
                                                      </figcaption>
                                                      <div class="tooltip"><i><span>Las millas LATAM Pass será entregados a los socios activos de LATAM Pass y dependerá de la cantidad de miembros que cumplan las condiciones.</span></i></div>
                                                    </blockquote>
                                                    <div class="content__info">
                                                      <p>Acabas de seleccionar el beneficio de bono de millas LATAM Pass para ti y tu mancha.</p>
                                                    </div>
                                                  </div>
                                                </label>
                                                <div class="content__error" style="display:none">* Campo obligatorio</div>
                                              </div>
                                            </div>
                                          </div>
                                        </section>

                                  <section class="section2">
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
                                                <label>Nombre de la Mancha</label>
                                              </div>
                                              <div class="form__fields">
                                                <dl class="type1">
                                                  <dt>
                                                    <input class="form__text1" type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" />

                                                  </dt>
                                                   <dd><span class="form__error" ></span>
                                                 @if ($errors->has('nombres'))
                                                    <span class="invalid-feedback form__error" role="alert">
                                                       {{ $errors->first('nombres') }}
                                                    </span>
                                                 @endif
                                                </dd>
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
                                                    <input class="form__text2" type="text" name="lidername" id="lidername" value="{{ old('alias') }}" maxlength="20"  placeholder="Alias"/>
                                                  </dt>
                                                  <dd></dd>
                                                </dl>
                                                <dl>
                                                  <dt>
                                                    <input type="text"class="form__text2 f1" name="prefix"  value="51-9" readonly>
                                                    <input class="form__text2  f2" type="text"  name="lidercel" id="lidercel" maxlength="8" value="{{ old('numero') }}"   placeholder="Teléfono"/>
                                                  </dt>
                                                  <dd></dd>
                                                </dl>
                                                <dl>
                                                  <dt>
                                                    <input class="form__text2" type="text" name="lideremail" value="{{ old('email') }}"   placeholder="Email (opcional)"/>
                                                  </dt>
                                                  <dd></dd>
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
                                                <div class="form__fields ">
                                                  <div class="form__fields--title">
                                                    <h3>Miembro # <span>1</span></h3>
                                                  </div>
                                                  <dl>
                                                    <dt>
                                                      <input name="alias[]" class="form__text2 aliaspata" type="text"  maxlength="20" value="{{ old('alias[]') }}"  placeholder="Alias" />
                                                    </dt>
                                                    <dd></dd>
                                                  </dl>
                                                  <dl>
                                                    <dt>
                                                      <input type="text"class="form__text2 f1" name="prefix"  value="51-9" readonly>
                                                      <input class="form__text2 f2 cellpata" maxlength="8"   name="telefono[]" type="text" value="{{ old('numero[]') }}"  placeholder="Teléfono" />

                                                    </dt>
                                                    <dd></dd>
                                                  </dl>
                                                  <dl>
                                                    <dt>
                                                      <input class="form__text2"  name="email[]" type="text" value="{{ old('email[]') }}"  placeholder="Email (opcional)" />
                                                    </dt>
                                                    <dd></dd>
                                                  </dl>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                            <div class="form__row2">
                                              <div class="form__buttons">
                                                <button class="button1 add-pata" type="button"><i>+ </i>Agregar otro participante </button>
                                              </div>
                                            </div>

                                          <div class="form__row1">
                                              <div class="form__info">
                                                  <p>Recuerda que el máximo de miembros por mancha es de 10. </p>
                                              </div>
                                          </div>
                                          <div class="form__row4">
                                              <div class="form__fields">
                                                  <dl class="type2">
                                                  <dt>
                                                      <div class="form__checkbox1">
                                                      <input type="checkbox" name="autorizar"  id="autorizar"/>
                                                      <label for="autorizar" id="lbl-autoriza"></label><span>Con mi registro, autorizo a CLARO para el envío de información sobre esta campaña y contenido comercial de CLARO.</span>
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
                                                <button class="button2 send-mancha " type="buttom" >Registrar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </form>
                                @if ($errors->any())
                                      <div class="alert alert-danger">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif
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
                  </style>
@endsection
