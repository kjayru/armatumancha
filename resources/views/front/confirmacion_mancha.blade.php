@extends('layout.master')
@section('content')
<div class="layout" id="app">
        <div class="layout__main">
          <div class="page3">
            <div class="page3__main">
              <section class="section1">
                <div class="section1__align">
                  <div class="section1__header">
                    <div class="links"><a class="btnBack" href="#"> <span>Volver </span></a></div>
                    <div class="title">
                      <h2>Bono de <img src="assets/pg2_icon_giga.svg" alt=""/></h2>
                    </div>
                  </div>
                  <div class="section1__main">
                    <div class="title">
                      <h2>Tu mancha ya está registrada con el beneficio </h2>
                      <p>Recibirás tu código de líder por SMS y además,<br/>los miembros también recibirán un SMS para que acepten unirse</p>
                    </div>
                    <div class="content">
                      <div class="content__info">
                        <h3>Mira quiénes ya forman parte de tu mancha </h3>
                      </div>
                    </div>
                    <div class="links"><a  href="/dashboard" >Continuar</a></div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
</div>
@endsection
