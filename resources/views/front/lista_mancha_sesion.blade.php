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
<div class="layout lytpl1" id="app">
        <div class="layout__main">
          <div class="page4">
            <div class="page4__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links">
                        <a class="btnBack" href="{{ route('home.index') }}"> <span>Volver</span></a>
                        <a class="btnClose" href="{{ route('home.index') }}"> <span>Cerrar sesión</span></a>
                    </div>
                    <div class="title">
                      <h2>AVENGERS</h2>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="grid">
                      <div class="grid__actions">
                          <a v-on:click="showModal()"> <img src="assets/pg4_icon_add.svg" alt=""/><span>Agregar miembro</span></a>
                          <a> <img src="assets/pg4_icon_leader.svg" alt=""/><span>Cambiar líder</span></a>
                          <a> <img src="assets/pg4_icon_clean.svg" alt=""/><span>Eliminar miembro</span></a>
                        </div>
                      <div class="grid__info">
                        <table>
                          <thead>
                            <tr>
                              <th> </th>
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
                      <form class="form" >
                        <div class="form__row1">
                          <div class="form__info">
                            <p>Recuerda que el máximo de miembros por mancha es 10</p>
                          </div>
                        </div>
                        <div class="form__row3">
                          <div class="form__buttons">
                            <button class="button2" type="submit">Actualizar</button>
                          </div>
                        </div>
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
                    <div class="page1__close" v-on:click="closeModal()">Cerrar</div>
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
                                <button class="button1" type="button" v-on:click="closeModal()">Registrar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page2" v-if="modal.page2">
                    <div class="page2__close" v-on:click="closeModal()">Cerrar</div>
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
