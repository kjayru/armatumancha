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
            @if($peticion)
                <div class="alert alert-warning" role="alert">
                        Existe una petición de cambio de líder
                </div>
            @endif



              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="title" style="margin-top:100px;">
                            <h2>{{ strtoupper($grupores->name)}}</h2>
                    </div>
                    <div class="grid">
                      <div class="grid__actions">
                            <div class="grid__actions">
                                    <button type="button" class="modal-1"><img src="assets/pg4_icon_add.svg" alt=""/><span>Agregar miembro</span></button>
                                    <button type="button" class="modal-2 disabled" disabled><img src="assets/pg4_icon_leader.svg" alt=""/><span>Cambiar líder</span></button>
                                    <button type="button" class="modal-3 disabled" disabled><img src="assets/pg4_icon_clean.svg" alt=""/><span>Eliminar miembro</span></button>
                                  </div>

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

                                @foreach($grupores->users as $group)
                                <tr>
                                  <td class="checkbox" {{ $group->role_id }}>
                                        @if($group->role_id==2)<input type="checkbox" class="estado-client" data-id="{{ $group->id}}"  data-aliaspata="{{ $group->alias }}" data-mancha="{{$grupores->name}}"  name="group_mancha"/>@endif
                                  </td>
                                  <td @if($group->role_id==1) data-aliaslider="{{ $group->alias}}" data-liderid="{{ $group->id}}" class="star" @endif><strong>{{ $group->alias }}</strong></td>
                                  <td><span> {{ \App\User::numerosview($group->numero) }}</span></td>
                                  <td><span>{{ $group->email }}</span></td>
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
                      <form class="form" id="recode" action="{{ action('front\RegisterController@listamanchasesion') }}" method="POST">
                        <div class="form__row1">
                          <div class="form__info">

                          </div>
                        </div>
                        <div class="form__row3">
                          <div class="form__buttons">
                            <button class="button2 btn-actualizar"  type="submit">Actualizar</button>

                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="codigo" value="{{ @$codigo }}">

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
        <form id="fordata">
            @csrf
        </form>
        <transition name="fade">
          <div class="layout__modal" style="display:none;">
            <div class="overlay">
              <div class="box">
                <div class="box__inset">
                  <div class="page1 mod-agregar-pata" style="display:none;">
                    <div class="page1__close">Cerrar</div>
                    <section class="section1">
                      <div class="section1__header">
                        <div class="title">
                          <h3>Agregar Miembro</h3>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" id="fr-nuevopata">
                              @csrf
                              <input type="hidden" name="group_id" value="{{ $grupores->id }}">
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" name="alias" placeholder="Alias"/>
                                  </dt>
                                  <dd></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" maxlength="9" id="telfpata" name="telefono" placeholder="Teléfono"/>
                                  </dt>
                                  <dd></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row1">
                              <div class="form__fields">
                                <dl>
                                  <dt>
                                    <input class="form__text1" type="text" name="email" placeholder="Email"/>
                                  </dt>
                                  <dd></dd>
                                </dl>
                              </div>
                            </div>
                            <div class="form__row1">
                                <div class="error pataerror">

                                </div>
                            </div>
                            <div class="form__row3">
                              <div class="form__buttons">
                                <button class="button1 btn-nuevopata" type="button">Registrar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page2 mod-lider" style="display:none">
                    <div class="page2__close" >Cerrar</div>
                    <section class="section1 confirma" style="display:none">
                      <div class="section1__header">
                        <div class="title ico_check" >
                          <h2>¡Listo! <br>
                              Esperamos la confirmación por SMS a <span></span> para que acepte ser el nuevo líder.</br></br>
                              Recuérdale que tiene 24 horas para aceptar

                          </h2>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" action="">
                            <div class="form__row3">
                              <div class="form__buttons">
                                <button class="button1 btn-ok" type="button">Aceptar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                    <section class="section1 esta-seguro" style="display:none">
                      <div class="section1__header">
                        <div class="title ico_alert">
                          <h2>¿Estás seguro que
                              <strong class="i-lider">**<span></span>**</strong> <br>
                              quiere ser líder de <strong class="i-nombre"> <b></b>?</strong>
                          </h2>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" action="">
                            <div class="form__row3">
                              <div class="form__buttons">
                                <a class="button1 btn-lider-si" type="button">Si</a>
                                <a class="button1 btn-lider-no" type="button">No</a>
                                <input type="hidden" name="datalider" id="datalider">
                                <input type="hidden" name="datapata" id="datapata">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page2 mod-delete" style="display:none;">
                    <div class="page2__close">Cerrar</div>
                    <section class="section1">
                      <div class="section1__header">
                        <div class="title ico_error">
                          <h2>¿Está seguro que desea eliminar a <span class="i-borrar"></span> de la mancha?</h2>
                        </div>
                      </div>
                      <div class="section1__main">
                        <div class="register">
                          <form class="form" action="">
                            <div class="form__row3">
                              <div class="form__buttons">
                                <button class="button1 btn-delete" type="button" >Si</button>
                                <button class="button1 btn-delete-no" type="button" >No</button>
                                <input type="hidden" name="datapata2" id="datapata2">
                              </div>
                              <p class="error" style="text-align: center"></p>
                            </div>

                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </transition>
</div>

@endsection
