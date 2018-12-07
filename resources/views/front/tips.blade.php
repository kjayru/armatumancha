@extends('layout.master')
@section('content')
<div class="layout lytpl2" id="app">
        <div class="layout__main">
                <div class="page8">
                    <div class="page8__main">
                        <section class="section1">
                            <div class="section1__align">
                                <div class="section1__header">
                                    <div class="links"><a class="btnBack" href="{{ route('home.index')}}"> <span>Volver</span></a></div>
                                </div>
                                <div class="section1__main">
                                    <div class="title">
                                        <h2>Tips para armar tu mancha</h2>
                                    </div>
                                    <div class="content">
                                        <div class="content__list">
                                            <ul>
                                                <li>Identifica a amigos o familiares que estén por cambiarse a Claro. </li>
                                                <li>¿Escuchaste de a alguien que necesita más megas? <br> ¡Él o ella es perfecto para tu mancha!</li>
                                                <li>¿Conoces de alguien que quiera irse de vacaciones? Invítalo a ser parte de tu mancha y reciban millas Latam PASS para viajar.</li>
                                                <li>Busca a esos patas que estén a punto de renovar su equipo. </li>
                                                <li>¿Alguno de tus contactos quiere migrar de Prepago a Postpago? <br> ¡Dale, agrégalo a tu mancha!</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="links">
                                        <a href="/register" class="btn">Armar tu mancha ahora &#62; </a>
                                        <a href="#">Revisa las condiciones aquí</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

        </div>
</div>

<div class="layout" id="app">
    <div class="layout__main">
        <div class="page1">
            <div class="page1__main">
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
            </div>
        </div>
    </div>
</div>

@endsection
