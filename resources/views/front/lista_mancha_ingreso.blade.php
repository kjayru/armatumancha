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
                @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
                 @endif


            <div class="page4__main">


              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"></div>
                    <div class="title">
                        <h2>¡Ya irían obteniendo

                            {!! $slogan !!}
                        por línea!
                        </h2>
                    </div>
                  </div>
                  <div class="section1__main">
                    <div class="title">
                        <h2>¡Sigue juntando a más patas para obtener <br/>hasta {{$copy}}</h2>
                      <small>*Cantidad de GB referencial, sujeto a que las líneas cumplan las condiciones aplicables al beneficio de Bono de GB  hasta el día 02/01.</small>
                    </div>
                  </div>
                </div>
              </section>



              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="title">
                      <h2>{{ strtoupper($grupores->name)}}</h2>
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
                            @foreach($grupores->users as $group)
                            <tr>
                              <td class="checkbox">
                                <input type="checkbox" class="estado-client" data-id="{{ $group->id}}" name="group_mancha"/>
                              </td>
                              <td @if($group->role->id==1) class="star" @endif><strong>{{ $group->alias }}</strong></td>
                              <td><span>{{ \App\User::numeroslice($group->numero) }}</span></td>
                              <td><span>@if($group->email){{ \App\User::correoslice($group->email) }} @endif</span></td>
                              <td><i @if($group->status==1) class="ico_status3" @elseif($group->status==2)  class="ico_status4" @else class="ico_status2" @endif></i></td>
                              <td><i  @if($group->califica==1) class="ico_status3" @elseif($group->califica==2)  class="ico_status1" @else class="ico_status2" @endif></i></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="content">
                        <div class="content__info">
                          <p>Recuerda que el máximo de miembros por mancha es 10</p>
                        </div>
                        <div class="content__description">
                          <h3>Inscripción </h3>
                          <p class="ico1"><span>¡Buenazo! Ya eres parte de una mancha</span></p>
                          <p class="ico2"><span>La inscripción de tu pata sigue pendiente. Recuérdale confirmar su inscripción respondiendo el SMS que le llegó, con el código de invitación: Ej. MA 12345</span></p>
                          <h3>Calificación</h3>
                          <p class="ico3"><span>¡Lo máximo! Cumpliste con lo necesario para recibir tu premio.</span></p>
                          <p class="ico1"><span>Uy tu pata está a un paso de recibir su premio. Revisa las condiciones de tu opción elegida y no dejes de ganar.</span></p>
                        </div>
                      </div>

                    </div>
                </div>
              </section>

              <section class="section3">
                <div class="section3__align">
                  <div class="section3__main">

                    <div class="code">
                      <form class="form" id="fr-code-lider" action="{{ action('front\RegisterController@listamanchasesion') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="POST">

                        <div class="form__row1">
                            <div class="form__info">
                                <p>Si eres el líder y quieres actualizar tu mancha,<br>ingresa tu código.<img src="assets/pg4_info.svg" alt=""/></p>
                              </div>
                        </div>
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <input class="form__text1" type="text" name="codigo"/>
                                <a href="/ingrese-celular" ><span> Olvidé mi código</span></a>
                              </dt>
                              <dd>
                                <button class="button1 send-code-lider" type="button">Continuar</button>
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

              <section class="section4" id="stack">
                <div class="section4__align">
                  <div class="section4__main">
                    <div class="content">
                      <div class="content__image"></div>
                      <div class="content__info">
                        <h3><span>Uy tu pata está a un paso de recibir su premio. Revisa las condiciones de tu opción elegida y no dejes de ganar.</span></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

            </div>
          </div>
        </div>
        <transition name="fade" style="display:none;">
          <div class="layout__modal">
            <div class="overlay">
              <div class="box">
                <div class="box__inset">
                  <div class="page1">
                    <div class="page1__close">Cerrar</div>
                    <section class="section1">
                      <div class="section1__header">
                        <div class="title">
                          <h3>Agregar Miembro</h3>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" action="{{ action('front\RegisterController@listamanchasesion') }}">
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
                                <button class="button1" type="button" >Registrar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page2" style="display:none;">
                    <div class="page2__close">Cerrar</div>
                    <section class="section1">
                      <div class="section1__main">
                        <div class="content">
                          <iframe width="800" height="600" src="https://www.youtube.com/embed/DOG5FlZJ81g" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page3" style="display:none;">
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
