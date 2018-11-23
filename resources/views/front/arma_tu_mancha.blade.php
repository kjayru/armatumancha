
@extends('layout.master')
@section('content')
<div class="layout" id="app">
        <div class="layout__main">
          <div class="page2">
            <div class="page2__main">
              <form class="form" v-on:submit.prevent="validate('form_concurse')" method="POST" action="{{ action('front\RegisterController@store') }}" data-vv-scope="form_concurse">
                <input type="hidden" name="_method" value="POST">
                <!-- VALUE BENEFICIO PARA REMITIR RUTA  gigas || millas -->
                <input type="hidden" name="beneficio" id="beneficio">
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
                        <input class="content__radio" id="gigas" type="radio" value="bonos" checked="checked" name="beneficio" v-model="register.beneficio" v-validate="'required'"/>
                        <label class="content__item" for="gigas">
                          <div class="content__bg">
                            <blockquote>
                              <figure><img src="assets/pg2_icon_gigas.svg" alt=""/></figure>
                              <figcaption>
                                <h4>Bono de gigas</h4>
                              </figcaption>
                              <div class="tooltip"><i v-on:click="$event.target.classList.toggle('active')"><span>El bono que tendrán será de acuerdo a la cantidad de amigos que vayan uniéndose en tu mancha.</span></i></div>
                            </blockquote>
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
                                  <input class="form__text1" type="text" name="nombres" v-model="register.nombres" v-validate="'required|string|min:3|norepeat1'"/>
                                </dt>
                                <dd><span class="form__error" v-show="errors.has('form_concurse.nombres')">* @{{ errors.first('form_concurse.nombres') }}</span></dd>
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
                                <dd><span class="form__error" v-show="errors.has('form_concurse.alias')">* @{{ errors.first('form_concurse.alias') }}</span></dd>
                              </dl>
                              <dl>
                                <dt>
                                  <input class="form__text2" type="text" name="telefono" v-model="register.telefono" v-validate="'numeric|required|min:9|max:9'" placeholder="Teléfono"/>
                                </dt>
                                <dd><span class="form__error" v-show="errors.has('form_concurse.telefono')">* @{{ errors.first('form_concurse.telefono') }}</span></dd>
                              </dl>
                              <dl>
                                <dt>
                                  <input class="form__text2" type="text" name="email" v-model="register.email" v-validate="'required|min:3|email'" placeholder="Email (opcional)"/>
                                </dt>
                                <dd><span class="form__error" v-show="errors.has('form_concurse.email')">* @{{ errors.first('form_concurse.email') }}</span></dd>
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
                              <div class="form__fields loop" v-for="(group, index) in register.miembros" :key="index">
                                <div class="form__fields--title">
                                  <h3>Miembro # @@{{ index + 1 }}</h3>
                                </div>
                                <dl>
                                  <dt>
                                    <input class="form__text2" type="text" placeholder="Alias" :key="'alias_'+index" :name="'alias_'+index" v-model="group[0].alias" v-validate="'required|min:3|norepeat2'"/>
                                  </dt>
                                  <dd><span class="form__error" v-show="errors.has('form_concurse.alias_'+index)">* @{{ errors.first('form_concurse.alias_'+index) }}</span></dd>
                                </dl>
                                <dl>
                                  <dt>
                                    <input class="form__text2" type="text" placeholder="Teléfono" :key="'telefono_'+index" :name="'telefono_'+index" v-model="group[0].telefono" v-validate="'numeric|required|min:9|max:9'"/>
                                    <dd><span class="form__error" v-show="errors.has('form_concurse.telefono_'+index)">* @{{ errors.first('form_concurse.telefono_'+index) }}</span></dd>
                                  </dt>
                                </dl>
                                <dl>
                                  <dt>
                                    <input class="form__text2" type="text" placeholder="Email (opcional)" :key="'email_'+index" :name="'email_'+index" v-model="group[0].email" v-validate="'required|min:3|email'"/>
                                  </dt>
                                  <dd><span class="form__error" v-show="errors.has('form_concurse.email_'+index)">* @{{ errors.first('form_concurse.email_'+index) }}</span></dd>
                                </dl>
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
                                <dd><span class="form__error" v-show="errors.has('form_concurse.autorizar')">* @{{ errors.first('form_concurse.autorizar') }}</span></dd>
                              </dl>
                            </div>
                          </div>
                          <div class="form__row3">
                            <div class="form__buttons">
                              <button type="submit">chaptcha </button>
                            </div>
                          </div>
                          <div class="form__row3">
                            <div class="form__buttons">
                              <button class="button2" type="submit">Registrar</button>
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
