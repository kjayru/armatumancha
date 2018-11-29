@extends('layout.master')
@section('content')
<div class="layout lytpl2" id="app">
<div class="layout__main">
        <div class="page4">
          <div class="page4__main">
            <section class="section1">
              <div class="section1__align">
                <div class="section1__header">
                  <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver</span></a></div>
                  <div class="title">
                    <h2>Preguntas frecuentes</h2>
                  </div>
                </div>
                <div class="section1__main">
                  <div class="title">
                    <h2>&nbsp;<br/>&nbsp;</h2>
                  </div>
                </div>
              </div>
            </section>
            <section class="questions">
              <div class="questions__align">
                <div class="questions__content">
                  <!--<div class="questions__title">
                    <h2>Preguntas frecuentes</h2>
                  </div>-->
                  <div class="questions__list">
                    <ul>
                      <li>
                        <h3><span></span>¿Cuál es la cantidad mínima y máxima de miembros que puede conformar una mancha?</h3>
                        <div>
                          <p>Recuerda que la cantidad mínima es 2 (líder y un miembro) y la máxima es 10 (líder y 9 miembros).</p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>¿Puedo armar o ser parte de una mancha si mi línea no es Claro?</h3>
                        <div>
                          <p>Si, solo recuerda que debes cumplir con los requisitos de la promoción para acceder a tu beneficio.</p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>¿Cuáles son los requisitos para acceder a estos beneficios?</h3>
                        <div>
                          <p>Los requisitos varían según el beneficio que elijas tú y tu mancha:</p>
                          <p><strong>•  Bono de gigas</strong><br>
                          Tú y tu mancha deberán cambiarse a Claro, renovar o pasarse de Prepago a Postpago Max Internacional. </p>
                          <p><strong>• Bono de Millas LATAM Pass</strong><br>
                          Tú y tu mancha deberán cambiarse a Claro, renovar o pasarse de Prepago a Postpago desde un plan Max Internacional 69.90 con un equipo de las siguientes marcas: Motorola, Huawei y LG. </p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>Para acceder al beneficio, ¿es necesario que toda la mancha se cambie, renueve o migre de Prepago a Postpago?</h3>
                        <div>
                          <p>Dependiendo del beneficio seleccionado:</p>
                          <p>- Si eligieron bono de gigas: En caso la línea líder pertenezca a Claro, tendrá la opción de no realizar una portabilidad, renovación o pasarse de prepago a plan postpago Max Internacional. El resto de miembros de la mancha sí debe realizar alguna de las transacciones mencionadas. <br>- Si optaron por bono de Millas LATAM Pass: Es obligatorio que todos los miembros realice una renovación, portabilidad o pasarse de prepago a postpago desde un plan Max Internacional 69.90 con un equipo Motorola, Huawei o LG.
                          </p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>A más miembros en mi mancha, ¿más beneficios?</h3>
                        <div>
                          <p>Sí. Si eligen bono de gigas pueden obtener hasta 10 GB por línea por mes, durante 1 año o si optan por Millas LATAM Pass pueden llevarse hasta 3,000 Millas LATAM Pass. Sujeto al cumplimiento de las condiciones.</p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>¿En qué casos pierdo el beneficio?</h3>
                        <div>
                          <p>
                            - Si migras de Postpago a Prepago.
                            <br>- Si tu línea es dada de baja o se realiza algún tipo de bloqueo.
                            <br>- Si haces portabilidad a otro operador
                            <br>- Para el beneficio de millas LATAM Pass, en caso no tengas con una cuenta activa de Socio LATAM Pass
                          </p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>Si ya acepté inscribirme a una mancha, ¿puedo acceder a cualquier beneficio?</h3>
                        <div>
                          <p>Recuerda que el líder es quien elige el beneficio para la mancha, sea bono de gigas o Millas LATAM Pass.</p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>He recibido invitaciones a más de una mancha, ¿puedo aceptar a todas?</h3>
                        <div>
                          <p>No, recuerda que solo puedes confirmar tu inscripción a una mancha. </p>
                        </div>
                      </li>
                       <li>
                        <h3><span></span>Tengo una línea Prepago de CLARO, ¿puedo acceder a esta promoción?</h3>
                        <div>
                          <p>Sí, siempre y cuando te hayan invitado a formar parte de una mancha y migres a un plan postpago Max Internacional (ver consideraciones de la promoción). Tienes hasta el 2 de enero del 2019 para pasarte a postpago Max Internacional y acceder al beneficio que escoja el líder de tu mancha.</p>
                        </div>
                      </li>
                      <li>
                        <h3><span></span>¿Para qué me sirven las Millas LATAM Pass?</h3>
                        <div>
                          <p>El beneficio de Millas LATAM Pass te servirá para viajar. Recuerda que, ¡a más miembros en tu mancha, más millas!<br>Para acumular millas debes ser Socio LATAM Pass, sin aún no lo eres regístrate aquí: <a href="https://www.latam.com/es_pe/apps/personas/registration" target="_blank">https://www.latam.com/es_pe/apps/personas/registration</a></p>
                        </div>
                      </li>

                      <li>
                        <h3><span></span>¿Qué pasa si cumplí las condiciones pero todavía no formo parte de ninguna mancha?</h3>
                        <div>
                          <p>Si portaste, renovaste o migraste de Prepago a Postpago después del 25/11¡NO te quedes sin tus beneficios! Arma tu mancha ahora y elige entre Millas o GB (Cierre de registro: 02/01/2019).</p>
                        </div>
                      </li>

                      <li>
                        <h3><span></span>¿Qué pasa si me invitaron a una mancha de millas y quiero GB?</h3>
                        <div>
                          <p>Si no confirmaste la invitación, puedes formar tu propia mancha o aceptar unirte a otra que haya elegido el beneficio de GB, siempre dentro del periodo máximo de registro.</p>
                        </div>
                      </li>

                      <li>
                        <h3><span></span>¿Me invitaron a unirme a una mancha pero quiero armar mi propia mancha?</h3>
                        <div>
                          <p>No te preocupes, si no aceptaste la invitación puedes formar tu propia mancha y elegir el beneficio que desees mientras esté vigente el periodo de registro.</p>
                        </div>
                      </li>

                      <li>
                        <h3><span></span>¿Puedo cambiar de beneficio?</h3>
                        <div>
                          <p>El beneficio escogido por líder no puede ser reemplazado.</p>
                        </div>
                      </li>

                      <li>
                        <h3><span></span>¿Si tengo varias líneas puedo integrar otras manchas?</h3>
                        <div>
                          <p>Si. Pero recuerda que un mismo número no puede formar parte de la misma mancha.</p>
                        </div>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
</div>

@endsection
