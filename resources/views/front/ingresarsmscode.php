@extends('layout.master')
@section('content')


<div class="layout" id="app">
        <div class="layout__main">
          <div class="page6">
            <div class="page6__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"><a href="{{ url()->previous() }}" class="btnBack"> <span>Volver</span></a></div>
                  </div>
                  <div class="section1__main">
                    <div class="title">
                      <h2>Ingresa tu número de celular</h2>
                      <p>y recibirás tu código de seguridad  por SMS</p>
                    </div>
                    <div class="code">
                      <form class="form" method="POST" action="{{ action('front\RegisterController@recuperarcodigo') }}">
                          @csrf
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <input class="form__text1" type="text" name="numerocel"/>
                              </dt>
                              <dd>
                                <button class="button1" type="submit">Continuar</button>
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
