
@extends('layout.master')
@section('content')
<div class="layout" id="app">
        <div class="layout__main">
          <div class="page2">
            <div class="page2__main">

              <form class="form" method="POST" id="fr-mancha" action="{{ action('front\RegisterController@store') }}" >
                <input type="hidden" name="_method" value="POST">
                <!-- VALUE BENEFICIO PARA REMITIR RUTA  gigas || millas -->

                @csrf
                <section class="section1">
                  <div class="section1__align">
                    <div class="section1__header">
                      <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver </span></a></div>
                      <div class="title">
                        <h2>¡Arma tu mancha y gana!</h2>
                      </div>
                    </div>
                    <div class="section1__main">
                      <div class="title">
                        <h2>Elige el beneficio</h2>
                      </div>
                      <div class="content">
                        <input class="content__radio" id="gigas" type="radio" value="bonos" checked="checked" name="beneficio" />
                        <label class="content__item" for="gigas">
                          <div class="content__bg">
                            <blockquote>
                              <figure><img src="assets/pg2_icon_gigas.svg" alt=""/></figure>
                              <figcaption>
                                <h4>Bono de gigas</h4>
                              </figcaption>
                              <div class="tooltip"><i><span>El bono que tendrán será de acuerdo a la cantidad de amigos que vayan uniéndose en tu mancha.</span></i></div>
                            </blockquote>
                          </div>
                        </label>
                        <input class="content__radio" id="latam" type="radio" value="latam" name="beneficio" />
                        <label class="content__item" for="latam">
                          <div class="content__bg">
                            <blockquote>
                              <figure><img src="assets/pg2_icon_latam.svg" alt=""/></figure>
                              <figcaption>
                                <h4>Millas LATAM Pass </h4>
                              </figcaption>
                              <div class="tooltip"><i v-on:click="$event.target.classList.toggle('active')"><span>El descuento que tendrán será de acuerdo a la cantidad de amigos que vayan uniéndose en tu mancha.</span></i></div>
                            </blockquote>
                          </div>
                        </label>
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
                                  <input class="form__text1" type="text" id="nombres" name="nombres" />
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
                                    <div class="circle__content">2</div>
                                  </div>
                                </div>
                              </div>
                              <label class="lider">Ingresa tus datos (líder)</label>
                            </div>
                            <div class="form__fields">
                              <dl>
                                <dt>
                                  <input class="form__text2" type="text" name="lidername"  placeholder="Alias"/>
                                </dt>
                                <dd></dd>
                              </dl>
                              <dl>
                                <dt>
                                  <input class="form__text2" type="text" name="lidercel"  placeholder="Teléfono"/>
                                </dt>
                                <dd></dd>
                              </dl>
                              <dl>
                                <dt>
                                  <input class="form__text2" type="text" name="lideremail"  placeholder="Email (opcional)"/>
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
                              <p>Recuerda que el máximo de miembros por mancha es de 10 patas. </p>
                            </div>
                          </div>
                          <div class="form__row1">
                            <div class="form__fields">
                              <dl class="type2">
                                <dt>
                                  <div class="form__checkbox1">
                                    <input type="checkbox" name="autorizar" id="Autorizar"/>
                                    <label for="Autorizar"></label><span>Autorizo a Claro para el envío de contenido publicitario. </span>
                                  </div>
                                </dt>
                                <dd></dd>
                              </dl>
                            </div>
                          </div>
                          <div class="form__row3">
                            <div class="form__buttons text-center">
                              <!--<button type="submit">chaptcha </button>-->

                              @php
                                  $attributes = [
                                        'data-theme' => 'dark',
                                        'data-type' => 'audio',
                                    ];
                              @endphp
                             {!! app('captcha')->display($attributes) !!}
                            </div>
                          </div>
                          <div class="form__row3">
                            <div class="form__buttons">
                              <button class="button2 send-mancha" type="buttom">Registrar</button>
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
@endsection
