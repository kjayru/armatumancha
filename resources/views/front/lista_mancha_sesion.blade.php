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
                        <a class="btnBack" href="/dashboard"> <span>Volver</span></a>
                        <!--<a class="btnClose" href="{{ route('home.index') }}"> <span>Cerrar sesión</span></a>-->
                    </div>
                    <div class="title">
                      <h2>{{ strtoupper($grupores->name)}}</h2>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="grid">
                      <div class="grid__actions">
                            <div class="grid__actions">
                                    <button type="button" class="modal-1"><img src="assets/pg4_icon_add.svg" alt=""/><span>Agregar miembro</span></button>
                                    <button type="button" class="modal-2 disabled" disabled><img src="assets/pg4_icon_leader.svg" alt=""/><span>Cambiar líder</span></button>
                                    <button type="button" class="modal-3 disabled" disabled><img src="assets/pg4_icon_clean.svg" alt=""/><span>Eliminar miembro</span></button>
                                  </div>

                        </div>
                      <div class="grid__info">
                         @if($peticion) <p style="color:green;">Existe un petición de cambio de lider</p>@endif
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
                                        @if($group->role_id==2)<input type="checkbox" class="estado-client" data-id="{{ $group->id}}"   name="group_mancha"/>@endif
                                  </td>
                                  <td @if($group->role_id==1) data-liderid="{{ $group->id}}" class="star" @endif><strong>{{ $group->alias }}</strong></td>
                                  <td><span>{{ $group->numero }}</span></td>
                                  <td><span>{{ $group->email }}</span></td>
                                  <td><i @if($group->status==1) class="ico_status3" @elseif($group->status==2)  class="ico_like" @else class="ico_unlike" @endif></i></td>
                                  <td><i  @if($group->califica==1) class="ico_status3" @elseif($group->califica==2)  class="ico_status2" @else class="ico_status1" @endif></i></td>
                                </tr>
                                @endforeach
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
                            <button class="button2 btn-actualizar" type="button">Actualizar</button>
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
                  <div class="page2" style="display:none">
                    <div class="page2__close">Cerrar</div>
                    <section class="section1">
                      <div class="section1__main">
                        <div class="content">

                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="page3" style="display:none">
                    <section class="section1">
                      <div class="section1__main">
                            <div class="content">

                                </div>
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
