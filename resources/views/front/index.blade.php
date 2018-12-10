
@extends('layout.master')
@section('content')




    <div class="layout__main">
      <div class="page1">
        <div class="page1__header">
          <section class="section1">
            <div class="section1__align">
              <div class="section1__main">
                <div class="banner">
                    <div class="banner__logo"></div>
                  <div class="banner__links">
                    <!--<a href="#" class="l1 player">Ver videotutorial</a>-->
                    <a href="/register" class="l2">Quiero armar mi mancha</a>
                  </div>
                  <div class="banner__video">
                    <video autoplay="autoplay" muted="muted" id="video" loop>
                      <source src="https://static.claro.com.pe/landings/havas/arma_tu_mancha/v3/assets/armatumancha.mp4" type="video/mp4"/>
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="page1__main">
        <section class="section5">
            <div class="section5__align">
              <div class="section5__header">
                <div class="title">
                  <h2>¿En qué consiste?</h2>
                </div>
                <div class="content">
                  <div class="content__item">
                    <div class="circle"><div class="circle__inner"><div class="circle__wrapper"><div class="circle__content">1</div></div></div></div>
                    <span>Arma tu  mancha y elige un súper bono de <strong>Gigas</strong> o <strong>Millas LATAM Pass</strong> </span>
                  </div>
                  <div class="content__item">
                    <div class="circle"><div class="circle__inner"><div class="circle__wrapper"><div class="circle__content">2</div></div></div></div>
                    <span>Cumple con las condiciones de la promoción y recibe tu premio </span>
                  </div>
                </div>
                <div class="links">
                  <a href="/tips">Tips para armar tu mancha</a>
                </div>
              </div>
              <div class="section5__main">
                <div class="image"><img src="assets/pg1_img13.svg" alt=""/></div>
                <div class="title">
                  <h2>Bono de Gigas</h2>
                  <h3>¡A más miembros en tu mancha, más Gigas para navegar!</h3>
                  <p>Para recibir el bono tú y tu mancha deben: <br>
                Cambiarse a Claro, Renovar su equipo o Migrar de Prepago a Postpago.</p>

                </div>
                <div class="list" id="list2">
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>10GB<span>X 12 meses </span></h5>
                        <h3>10 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>9GB<span>X 12 meses </span></h5>
                        <h3>9 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>8GB<span>X 12 meses </span></h5>
                        <h3>8 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>7GB<span>X 12 meses </span></h5>
                        <h3>7 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>6GB<span>X 12 meses </span></h5>
                        <h3>6 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>5GB<span>X 12 meses </span></h5>
                        <h3>5 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>4GB<span>X 12 meses </span></h5>
                        <h3>4 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>3GB<span>X 12 meses </span></h5>
                        <h3>3 miembros</h3>
                      </div>
                    </section>
                  </div>
                  <div class="item">
                    <section>
                      <div class="info">
                        <h5>2GB<span>X 12 meses </span></h5>
                        <h3>2 miembros</h3>
                      </div>
                    </section>
                  </div>
                </div>
                <div class="links">
                  <a href="/register">Quiero armar mi mancha</a>
                </div>
              </div>
            </div>
        </section>

        <section class="section3">
            <div class="section3__align">
              <div class="section3__header">
              </div>
              <div class="section3__main">
                <div class="image"><img src="assets/pg1_logo_latam.svg" alt=""/></div>
                <div class="title">
                  <h2>Bono de Millas LATAM Pass</h2>
                  <h3>¡Recibe hasta 3,000 Millas LATAM Pass para viajar!</h3>
                  <p>Para recibir el bono tú y tu mancha deben: Cambiarse a Claro, Migrar de Prepago a Postpago con un <br>plan MAX Internacional 69.90 o Renovar con un equipo Huawei, Motorola o LG </p>


                </div>
                <div class="list">
                  <ul id="list3">
                    <li>
                      <blockquote>
                        <div>
                          <h5>3,000<span><i>Millas</i> x línea </span></h5>
                          <h3>8 a 10 miembros</h3>
                        </div>
                      </blockquote>
                    </li>
                    <li>
                      <blockquote>
                        <div>
                          <h5>2,000<span><i>Millas</i> x línea </span></h5>
                          <h3>5 a 7 miembros</h3>
                        </div>
                      </blockquote>
                    </li>
                    <li>
                      <blockquote>
                        <div>
                          <h5>1,000<span><i>Millas</i> x línea </span></h5>
                          <h3>2 a 4 miembros</h3>
                        </div>
                      </blockquote>
                    </li>
                  </ul>
                </div>
                <div class="links">
                  <a href="/register">Quiero armar mi mancha</a>
                </div>
              </div>
            </div>
        </section>

          <section class="considerations">
            <div class="considerations__align">
              <div class="considerations__title">
                <h2>¡Ten en cuenta!</h2>
              </div>
              <div class="considerations__content">
                <div class="considerations__subtitle"><a>Consideraciones generales para el registro de tu mancha</a><i></i></div>
                <div class="considerations__data">
                  <div class="considerations__info">
                    <ul>
                      <li>Registro de Manchas válido del 27/11/2018 al 02/01/2019</li>
                      <!--<li>Todas las líneas (incluyendo la del líder) deberán pertenecer a una sola mancha </li>-->
                      <li>Todas las líneas registradas podrán pertenecer a una sola mancha</li>
                      <li>La mancha debe estar conformada por 2 miembros como mínimo y máximo 10, incluido el líder.</li>
                      <li>El nombre de la mancha debe ser único (alfanumérico  entre mayúsculas, minúsculas y números) con una longitud máxima de 15 caracteres, no se consideran los espacios y no se podrá editar una vez creada la mancha.</li>
                      <li>Los miembros pueden hacer seguimiento del estado de su mancha</li>
                      <!--<li>Se considerarán únicamente en el registro aquellas líneas activas sin bloqueos, suspensiones o bajas.</li>-->
                      <li>Para la validez del registro, se considerarán únicamente aquellas líneas activas sin bloqueos, suspensiones o bajas.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="considerations__content">
                <div class="considerations__subtitle"><a>Consideraciones aplicables al beneficio de Bono GB</a><i></i></div>
                <div class="considerations__data">
                  <div class="considerations__info">
                    <ul>
                      <li>El período para el cumplimiento de las condiciones aplicables al beneficio de Bono de GB es del 27/11/2018 al 02/01/2019</li>
                      <li>Las condiciones para el beneficio pueden haber sido cumplidas antes del registro de la mancha siempre y cuando estas se hayan realizado entre del 27/11/2018 al 02/01/2019. Recuerda que el cumplimiento de las condiciones no exonera el registro de la mancha y está siempre sujeto a la revisión de Claro.</li>
                      <!--<li>Las líneas de la mancha deberán estar activas sin bloqueos, suspensiones o bajas.</li>-->
                      <li>Las líneas de la mancha, durante los 12 meses que comprende el beneficio, deberán estar activas sin bloqueos, suspensiones o bajas.</li>
                      <li>Cada línea de la mancha debe haber realizado durante este período, una de las siguientes acciones (ver excepción aplicable al líder en el siguiente punto):
                        <ul>
                          <li>Portarse a Claro (la línea debe tener 30 días de antigüedad mínima en el operador cedente).</li>
                          <li>Renovar (la línea debe tener 06 meses de antigüedad mínima en Claro). </li>
                          <li>Migrar de modalidad prepago a postpago (la línea debe tener 06 meses de antigüedad mínima).</li>
                        </ul>
                      </li>
                      <li>En caso la línea líder pertenezca a Claro, tendrá la opción de no realizar ninguna de las transacciones mencionadas (portabilidad, renovación o migración).</li>
                      <li>Los planes a portar, renovar o migrar de prepago a postpago son los Planes Max Internacional.</li>
                      <!--<li>Mensualmente, se validará la cantidad de líneas de la mancha que cumplen las condiciones y, en función de ello, se calculará la cantidad de GB que será entregada durante cada período, y se les notificará vía SMS a todas las líneas de la mancha.</li>-->
                      <li>Mensualmente, se validará la cantidad de líneas de la mancha que hayan mantenido las condiciones del beneficio y, en función de ello, se calculará nuevamente la cantidad de GB que corresponda entregar en dicho período, y se les notificará vía SMS a todas las líneas de la mancha.</li>
                      <li>Para la entrega del beneficio de bono de GB, las líneas deberán estar activas. </li>
                      <li>El bono de GB no utilizado durante ese período en el que la línea no estuvo activa, no podrá ser recuperado.</li>
                      <li>La entrega de GB se realizará durante 12 periodos consecutivos.</li>
                      <li>Los GB entregados durante cada período tendrán una vigencia de 31 días.</li>
                      <li>Los GB no son acumulables.</li>
                      <li>La cantidad de GB a entregar de acuerdo al número de líneas en la mancha que hayan cumplido con todas las condiciones, se realizará según la siguiente tabla:
                        <table>
                          <tr>
                            <td>Cantidad de Personas </td>
                            <td>Bonos</td>
                          </tr>
                          <tr>
                            <td>2 </td>
                            <td>2 GB por línea</td>
                          </tr>
                          <tr>
                            <td>3 </td>
                            <td>3 GB por línea</td>
                          </tr>
                          <tr>
                            <td>4 </td>
                            <td>4 GB por línea</td>
                          </tr>
                          <tr>
                            <td>5 </td>
                            <td>5 GB por línea</td>
                          </tr>
                          <tr>
                            <td>6 </td>
                            <td>6 GB por línea</td>
                          </tr>
                          <tr>
                            <td>7 </td>
                            <td>7 GB por línea</td>
                          </tr>
                          <tr>
                            <td>8 </td>
                            <td>8 GB por línea</td>
                          </tr>
                          <tr>
                            <td>9 </td>
                            <td>9 GB por línea</td>
                          </tr>
                          <tr>
                            <td>10 </td>
                            <td>10 GB por línea</td>
                          </tr>
                        </table>
                      </li>
                      <li>En los planes ilimitados, el beneficio de bono de GB es aplicable para cada ciclo de facturación durante 12 períodos, y servirá para incrementar la cantidad de GB al tope máximo, luego del cual se efectuará la reducción de velocidad de internet.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="considerations__content">
                <div class="considerations__subtitle"><a>Consideraciones aplicables al beneficio de Millas LATAM Pass</a><i></i></div>
                <div class="considerations__data">
                  <div class="considerations__info">
                    <ul>
                      <li>El período para el cumplimiento de las condiciones aplicables al beneficio de Millas LATAM Pass es del 27/11/2018 al 02/01/2019</li>
                      <li>Las condiciones para el beneficio pueden haber sido cumplidas antes del registro de la mancha siempre y cuando estas se hayan realizado entre del 27/11/2018 al 02/01/2019. Recuerda que el cumplimiento de la condiciones no exonera el registro de la mancha y está siempre sujeto a la revisión de Claro.</li>
                      <li>Entrega de millas que corresponda se efectuará entre el 10 y el 31 de enero de 2019. </li>
                      <!--<li>Las líneas de la mancha deberán estar activas sin bloqueos, suspensiones o bajas.</li>-->
                      <li>Las líneas de la mancha, al momento de entrega del beneficio, deberán estar activas sin bloqueos, suspensiones o bajas.</li>
                      <li>Cada línea de la mancha debe haber realizado durante este período, una de las siguientes acciones:
                        <ul>
                          <li>Portarse a Claro (la línea debe tener 30 días de antigüedad mínima en el operador cedente).</li>
                          <li>Renovar (la línea debe tener 06 meses de antigüedad mínima en Claro).</li>
                          <li>Migrar de modalidad prepago a postpago (la línea debe tener 06 meses de antigüedad mínima).</li>
                        </ul>
                      </li>
                      <li>Las líneas se podrán portar, renovar o migrar de prepago a postpago desde el plan Max Internacional 69.90 con equipos de las marcas Motorola, Huawei y LG. </li>
                      <li>Sujeto a firma de acuerdo de equipos en la modalidad elegida por el cliente.</li>
                      <!--<li>El titular de cada línea debe ser socio activo de LATAM Pass.</li>-->
                      <li>El titular de cada línea debe ser socio activo de LATAM Pass. El bono de millas será entregado a la cuenta LATAM Pass asociada al DNI del titular de la línea registrada, la cual deberá encontrarse activa.</li>
                      <li>Se enviará un SMS a las líneas de la mancha que cumplan con las condiciones descritas anteriormente. En este SMS se les indicará la cantidad de Millas LATAM Pass que recibirán, la fecha de entrega y condiciones de la misma. </li>
                      <li>En caso el titular de la línea no sea socio activo LATAM Pass, tendrá hasta el 8 de enero de 2019 para registrarse como tal. </li>
                      <li>El cálculo de la cantidad de millas a entregar se realizará según la siguiente tabla:
                        <table>
                          <tr>
                            <td>Cantidad de Personas </td>
                            <td>Millas</td>
                          </tr>
                          <tr>
                            <td>2 </td>
                            <td rowspan="3">1000 <br> <span>millas por linea</span></td>
                          </tr>
                          <tr>
                            <td>3 </td>
                          </tr>
                          <tr>
                            <td>4 </td>
                          </tr>
                          <tr>
                            <td>5 </td>
                            <td rowspan="3">2000 <br> <span>millas por linea</span></td>
                          </tr>
                          <tr>
                            <td>6 </td>
                          </tr>
                          <tr>
                            <td>7 </td>
                          </tr>
                          <tr>
                            <td>8 </td>
                            <td rowspan="3">3000 <br> <span>millas por linea</span></td>
                          </tr>
                          <tr>
                            <td>9 </td>
                          </tr>
                          <tr>
                            <td>10 </td>
                          </tr>
                        </table>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="section6">
            <div class="section6__align">
              <div class="section6__main">
                <div class="content">
                  <h4>Compártelo con tus amigos</h4><span>
                      <input type="hidden" name="clip" id="clip" value="http://armatumancha.claro.com.pe/">
                    <a href="" class="btn-facebook"><img src="assets/pg1_ico_facebook.svg" alt=""/></a>
                    <a href="#" class="btn-copiar" data-url="http://armatumancha.claro.com.pe/"><img src="assets/pg1_ico_whatsapp.svg" alt=""/></a></span>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>







@endsection
