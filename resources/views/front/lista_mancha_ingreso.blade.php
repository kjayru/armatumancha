@extends('layout.master')
@section('content')
<style type="text/css">
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.25s ease-out;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

  </style>
<div class="layout lytpl2" id="app">
        <div class="layout__main">
          <div class="page4">
            <div class="page4__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"><a class="btnBack" href=""> <span>Volver</span></a></div>
                    <div class="title">
                      <h2>¡Ya vas obteniendo <span>5 </span>GB por línea! </h2>
                    </div>
                  </div>
                  <div class="section1__main">
                    <div class="title">
                      <h2>¡Sigue juntando a más patas para obtener<br/>hasta 10 GB por mes durante 1 año!</h2>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="title">
                      <h2>AVENGERS</h2>
                    </div>
                    <div class="grid">
                      <div class="grid__info">
                        <table>
                          <thead>
                            <tr>
                              <th class="checkbox"> </th>
                              <th><span><strong>Alias</strong></span></th>
                              <th>Teléfono</th>
                              <th>E-mail</th>
                              <th>Inscripción</th>
                              <th>Calificación</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" name="group_mancha"/>
                              </td>
                              <td class="star"><strong>Spiderman</strong></td>
                              <td><span>996******</span></td>
                              <td><span>corr***@prueba.com</span></td>
                              <td><i class="ico_like"></i></td>
                              <td><i class="ico_status1"></i></td>
                            </tr>
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" name="group_mancha"/>
                              </td>
                              <td><strong>Spiderman</strong></td>
                              <td><span>996******</span></td>
                              <td><span>corr***@prueba.com</span></td>
                              <td><i class="ico_unlike"> </i></td>
                              <td><i class="ico_status2"></i></td>
                            </tr>
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" name="group_mancha"/>
                              </td>
                              <td><strong>Spiderman</strong></td>
                              <td><span>996******</span></td>
                              <td><span>corr***@prueba.com</span></td>
                              <td><i class="ico_status3"> </i></td>
                              <td><i class="ico_status1"></i></td>
                            </tr>
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" name="group_mancha"/>
                              </td>
                              <td><strong>Spiderman</strong></td>
                              <td><span>996******</span></td>
                              <td><span>corr***@prueba.com</span></td>
                              <td><i class="ico_unlike"> </i></td>
                              <td><i class="ico_status1"></i></td>
                            </tr>
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" name="group_mancha"/>
                              </td>
                              <td><strong>Spiderman</strong></td>
                              <td><span>996******</span></td>
                              <td><span>corr***@prueba.com</span></td>
                              <td><i class="ico_unlike"> </i></td>
                              <td><i class="ico_status2"></i></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="code">
                      <form class="form" action="" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <div class="form__row1">
                          <div class="form__info">
                            <p>Si eres el líder y quieres actualizar tu mancha,<br/>ingresa tu código.</p>
                          </div>
                        </div>
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <input class="form__text1" type="text" name="nombres"/><span>Olvide mi código</span>
                              </dt>
                              <dd>
                                <button class="button1" type="submit">Continuar</button>
                              </dd>
                            </dl>
                          </div>
                        </div>
                        <!--.form__row3
                        .form__buttons
                            button.button2(type='submit') Registrar

                        -->
                      </form>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
        <transition name="fade">
          <div class="layout__modal" v-if="modal.show" v-bind:class="{active: modal.show}">
            <div class="overlay">
              <div class="box">
                <div class="box__inset">
                  <div class="page1" v-if="modal.page1">
                    <div class="page1__close" @click="closeModal()">Cerrar</div>
                    <section class="section1">
                      <div class="section1__header">
                        <div class="title">
                          <h3>Agregar Miembro</h3>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" action="">
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" name="nombres" placeholder="Alias"/>
                                  </dt>
                                  <dd><span class="form__error">error</span></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" name="nombres" placeholder="Teléfono"/>
                                  </dt>
                                  <dd><span class="form__error">error</span></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" name="nombres" placeholder="Email"/>
                                  </dt>
                                  <dd><span class="form__error">error</span></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row3">
                              <div class="form__buttons">
                                <button class="button1" type="button" @click="closeModal()">Registrar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page2" v-if="modal.page2">
                    <div class="page2__close" @click="closeModal()">Cerrar</div>
                    <section class="section1">
                      <div class="section1__main">
                        <div class="content">
                          <iframe width="800" height="600" src="https://www.youtube.com/embed/DOG5FlZJ81g" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page3" v-if="modal.page3">
                    <section class="section1">
                      <div class="section1__main">
                        <div class="loader"></div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>

@endsection
