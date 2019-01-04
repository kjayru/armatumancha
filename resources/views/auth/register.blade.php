@extends('layout.master')
@section('content')

<div class="layout" id="app">
  <div class="layout__main">
    <div class="page7"> @if (session('alert'))
      <div class="alert alert-success"> {{ session('alert') }} </div>
      @endif
      <div class="page7__main">
        <section class="section1">
          <div class="section1__align">
            <div class="section1__header">
              <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver</span></a></div>
              <div class="title">
                <h2>¡Gracias a todos por participar!</h2>
                <p>Revisa qué miembros de tu mancha cumplieron con las condiciones para recibir el beneficio de Gigas o Millas.</p>
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
                          <button class="button1 btn-buscar" type="submit" onclick="gtag('event', 'Continuar', {  'event_category' : 'Consulta',  'event_label' : '-'});">Continuar</button>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </form>
              </div>
              <div class="content">
                <p>Si tienes alguna duda, por favor comunícate con nuestro <br>
                  <a href="javascript:void(0);" onclick="window.open('https://claroperu.s1gateway.com/webchat/chat_embed.php?cpgid=10000&nw=1','terms','height=560,width=400,top=0,left=0,status=no,addressbar=yes,menubar=no,scrollbars=yes')">chat</a> de Lunes a Domingo de 9:00 AM a 10:00 PM</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection
