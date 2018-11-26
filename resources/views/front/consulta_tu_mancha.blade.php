@extends('layout.master')
@section('content')

<div class="layout" id="app">
        <div class="layout__main">
          <div class="page7">
            <div class="page7__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"><a class="btnBack" href="#"> <span>Volver</span></a></div>
                    <div class="title">
                      <h2>¿Quiénes forman<br/>parte de tu mancha?</h2>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="title">
                      <h2>Ingresa el nombre de tu <strong>mancha </strong>o número <strong>celular</strong></h2>
                    </div>
                    <div class="code">
                      <form class="form" action="{{ action('front\HomeController@buscarmancha') }}"  id="fr-consulta-mancha" method="POST">
                          <input type="hidden" name="_method" value="POST">
                          @csrf
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <input class="form__text1" type="text" name="manchacelular"/>
                              </dt>
                              <dd>
                                <button class="button1 btn-buscar" type="submit">Continuar</button>
                              </dd>
                            </dl>
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
</div>
@endsection
