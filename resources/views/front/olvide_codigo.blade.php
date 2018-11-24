@extends('layout.master')
@section('content')

<div class="layout" id="app">
        <div class="layout__main">
          <div class="page6">
            <div class="page6__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"><a class="btnBack" href="{{ url()->previous() }}"> <span>Volver</span></a></div>
                  </div>
                  <div class="section1__main">
                    <div class="title">
                      <h2>Ingresa el código de seguridad</h2>
                      <p>enviado por SMS</p>
                    </div>
                    <div class="code">
                      <form class="form" action="">
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <input class="form__text1" type="text" name="nombres"/>
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
