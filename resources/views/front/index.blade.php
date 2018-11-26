
@extends('layout.master')
@section('content')
<div class="layout__main">
        <div class="page1">
          <div class="page1__header">
            <section class="section1">
              <div class="section1__align">
                <div class="section1__main"></div>
              </div>
            </section>
          </div>
          <div class="page1__main">
            <section class="section1">
              <div class="section1__align">
                <div class="section1__main">
                  <!--.title: h2 ¿Qué pasos sigo?-->
                  <!--desktop-->
                  <div class="content">
                        <div class="info">
                                <p>¡A partir del <span>27 de diciembre</span> podrás registrar a tu mancha!</p>
                            </div>
                        <div class="title2">
                            <h2>¿Cómo armo mi mancha?</h2>
                        </div>
                    <div class="list" id="list1">


                      <div class="item">
                        <figure><img src="assets/pg1_img1.svg" alt=""/></figure>
                        <figcaption>
                          <h4>Sé el líder de tu mancha</h4>
                          <p>Elige el beneficio para tu mancha  e ingresa tus datos</p>
                        </figcaption>
                        <div class="arrow"></div>
                      </div>
                      <div class="item">
                        <figure><img src="assets/pg1_img2.svg" alt=""/></figure>
                        <figcaption>
                          <h4>Arma tu mancha</h4>
                          <p>Registra a los miembros de tu mancha</p>
                        </figcaption>
                        <div class="arrow"></div>
                      </div>
                      <div class="item">
                        <figure><img src="assets/pg1_img3.svg" alt=""/></figure>
                        <figcaption>
                          <h4>Recibe un SMS</h4>
                          <p>Tendrás un código de líder y los miembros de tu mancha recibirán un SMS de invitación</p>
                        </figcaption>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </section>
            <section class="section2" style="display:none">
              <div class="section2__align" >
                <div class="section2__main">
                  <div class="title">
                    <h2>¡Elige entre!</h2>
                  </div>
                  <div class="content">
                    <div class="content__item">
                      <blockquote><a href="/register">
                          <figure>
                            <h4>Arma tu mancha</h4><img src="assets/pg1_img4.svg" alt=""/>
                          </figure>
                          <figcaption>
                            <h5>Sé el líder y registra <br/>a tu mancha</h5>
                          </figcaption></a></blockquote>
                    </div>
                    <div class="content__arrow"></div>
                    <div class="content__item">
                      <blockquote><a href="/mira-el-status-de-tu-mancha">
                          <figure>
                            <h4>Mira el status<br/>de tu mancha</h4><img src="assets/pg1_img5.svg" alt=""/>
                          </figure>
                          <figcaption>
                            <h5>Si ya eres parte de una mancha, <br/> mira cómo van</h5>
                          </figcaption></a></blockquote>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="section5">
              <div class="section5__align">
                <div class="section5__header">
                  <div class="title">
                    <h2>¿En qué consiste?</h2>
                  </div>
                  <div class="subtitle">
                    <h3>Arma tu mancha y elige un súper bono de gigas o Millas LATAM Pass</h3>
                  </div>
                </div>
                <div class="section5__main">
                  <div class="image"><img src="assets/pg1_img13.svg" alt=""/></div>
                  <div class="title">
                    <h2>Bono de gigas</h2>
                    <p>Cámbiate a Claro, renueva o pásate de Prepago a Postpago Max Internacional. <br/>¡Hay un <span>súper bono </span>de hasta <span>10 GB </span>para navegar por 12 meses! </p>
                    <h3>A más miembros, ¡más gigas!</h3>

                  </div>
                  <div class="list" id="list2">
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img23.svg" alt=""/></div>
                        <div class="title">
                          <h3>10 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>10GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img24.svg" alt=""/></div>
                        <div class="title">
                          <h3>9 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>9GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img25.svg" alt=""/></div>
                        <div class="title">
                          <h3>8 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>8GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img28_7.svg" alt=""/></div>
                        <div class="title">
                          <h3>7 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>7GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img28.svg" alt=""/></div>
                        <div class="title">
                          <h3>6 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>6GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img17.svg" alt=""/></div>
                        <div class="title">
                          <h3>5 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>5GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img16.svg" alt=""/></div>
                        <div class="title">
                          <h3>4 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>4GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img15.svg" alt=""/></div>
                        <div class="title">
                          <h3>3 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>3GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
                    <div class="item">
                      <section>
                        <div class="image"><img src="assets/pg1_img14.svg" alt=""/></div>
                        <div class="title">
                          <h3>2 miembros</h3>
                        </div>
                        <div class="info">
                          <h5>2GB<span>por línea </span></h5>
                          <p>X 12 meses</p>
                        </div>
                      </section>
                    </div>
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
                    <p>Cámbiate a Claro, renueva o pásate de Prepago a Postpago desde <br/>Max Internacional 69.90 con un equipo HUAWEI, LG o MOTOROLA. <br/>¡Hay un súper bono de hasta <span>3,000 </span><span>Millas LATAM Pass</span>!</p>

                    <h3>A más miembros, ¡más Millas LATAM Pass!</h3>
                  </div>
                  <div class="list">
                    <ul id="list3">
                      <li>
                         <blockquote>
                          <h5>8 a 10 mimebros</h5>
                        </blockquote>
                        <blockquote>
                          <div>
                            <!--h6 hasta-->
                            <h3>3,000</h3>
                            <h3>3,000</h3><span>Millas
                              <!--span dto.--></span>
                          </div>
                        </blockquote>
                      </li>
                      <li>
                        <blockquote>
                          <h5>5 a 7 mimebros</h5>
                        </blockquote>
                        <blockquote>
                          <div>
                            <!--h6 hasta-->
                            <h3>2,000</h3>
                            <h3>2,000</h3><span>Millas
                              <!--span dto.--></span>
                            <!--p x 12 meses-->
                          </div>
                        </blockquote>
                      </li>
                      <li>
                       <blockquote>
                          <h5>2 a 4 miembros</h5>
                        </blockquote>
                        <blockquote>
                          <div>
                            <!--h6 hasta-->
                            <h3>1,000</h3>
                            <h3>1,000</h3><span>Millas
                              <!--span dto.--></span>
                            <!--p x 12 meses-->
                          </div>
                        </blockquote>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>

            <section class="section6">
              <div class="section6__align">
                <div class="section6__main">
                  <div class="content">
                    <h4>¡Comparte la promo con tu <span>mancha!</span></h4><span><a href="javascript:fbShare('http://armatumancha.claro.com.pe', 'Arma tu mancha', 'Arma tu mancha claro', 'https://static.claro.com.pe/landings/havas/arma_tu_mancha/v2/assets/Banner_Landing_Arma_tu_Mancha_Tablet_V_768x400.jpg', 520, 350)"><img src="assets/pg1_ico_facebook.svg" alt=""/></a><a href="whatsapp://send?text=http://armatumancha.claro.com.pe/" data-action="share/whatsapp/share"><img src="assets/pg1_ico_whatsapp.svg" alt=""/></a></span>
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
                  <div class="considerations__subtitle"><a>Consideraciones Generales</a><i></i></div>
                  <div class="considerations__data">
                    <div class="considerations__info">
                      <ul>
                        <li>Pasos para participar de la promoción:
                          <ul>
                            <li>Arma tu mancha en la web: <a href="http://armatumancha.claro.com.pe/arma-tu-mancha" target="_blank">armatumancha.claro.com.pe</a></li>
                            <li>Elige uno de los beneficios: GB o Millas LATAM Pass. Para la aplicación de este último beneficio (Millas LATAM Pass), el titular de cada línea debe tener una cuenta LATAM Pass activa.</li>
                            <li>Invita a tus amigos</li>
                            <li>Tus amigos deberán aceptar la invitación</li>
                          </ul>
                        </li>
                        <li>Condiciones para el Registro de Manchas
                          <ul>
                            <li>Registro de Manchas válido del 26/11/2018 al 02/01/2019.</li>
                            <li>La línea del líder deberá pertenecer a una sola mancha </li>
                            <li>La mancha debe estar conformada por 2 miembros como mínimo y máximo 10, incluido el líder.</li>
                            <li>El nombre de la mancha debe ser único (alfanumérico  entre mayúsculas, minúsculas y números) con una longitud máxima de 15 caracteres, no se consideran los espacios y no se podrá editar una vez creada la mancha.</li>
                            <li>Los miembros pueden ver el estado de su mancha y si califican o no en la Web buscando por:
                              <ul>
                                <li>Nombre de la mancha </li>
                                <li>Línea móvil</li>
                              </ul>
                            </li>
                            <li>Se considerarán únicamente en el registro aquellas líneas activas sin bloqueos, suspensiones o bajas.</li>
                          </ul>
                        </li>
                        <li>Condiciones aplicables al beneficio de Bono de GB
                          <ul>
                            <li>El período para el cumplimiento de las condiciones aplicables al beneficio de Bono de GB es del <b>  26/12/2018 al 02/01/2019.</b></li>
                            <li>Las líneas de la mancha deberán estar activas sin bloqueos, suspensiones o bajas.</li>
                            <li>Cada línea de la mancha debe haber realizado durante este período, una de las siguientes acciones:
                              <ul>
                                <li>La línea a portar debe tener 30 días de antiguedad mínima en el operador cedente.</li>
                                <li>La línea a renovar debe tener 06 meses de antiguedad mínima. </li>
                                <li>La línea a migrar de modalidad prepago a postpago debe tener 06 meses de antiguedad mínima.</li>
                              </ul>
                            </li>
                            <li>Los planes a portar, renovar o migrar de prepago a postpago son los Planes Max Internacional.</li>
                            <li>En caso la línea líder pertenezca a Claro, tendrá la opción de no realizar ninguna de las transacciones mencionadas (portabilidad, renovación o migración).</li>
                            <li>Mensualmente, se validará la cantidad de líneas de la mancha que cumplen las condiciones y, en función de ello, se calculará la cantidad de GB que será entregada durante cada período, y se les notificará vía SMS.</li>
                            <li>El cálculo de la cantidad de GB a entregar se realizará según la tabla del punto V.</li>
                          </ul>
                        </li>
                        <li>Condiciones aplicables al beneficio de Millas LATAM Pass:
                          <ul>
                            <li>El período para el cumplimiento de las condiciones aplicables al beneficio de Millas LATAM Pass es del <b>  26/12/2018 al 02/01/2019.</b></li>
                            <li>Las líneas de la mancha deberán estar activas sin bloqueos, suspensiones o bajas.</li>
                            <li>Cada línea de la mancha debe haber realizado durante este período, una de las siguientes acciones:
                              <ul>
                                <li>La línea a portar con equipo debe tener 30 días de antiguedad mínima en el operador cedente.</li>
                                <li>La línea a renovar con equipo debe tener 06 meses de antiguedad mínima</li>
                                <li>La línea a migrar con equipo de modalidad prepago a postpago debe tener 06 meses de antiguedad mínima.</li>
                              </ul>
                            </li>
                            <li>Las líneas se podrán portar, renovar o migrar de prepago a postpago desde el plan Max Internacional 69.90 con equipos de las marcas Motorola, Huawei y LG. </li>
                            <li>Sujeto a firma de acuerdo de equipos en la modalidad elegida por el cliente.</li>
                            <li>El titular de cada línea debe ser socio activo de LATAM Pass.</li>
                            <li>Se enviará un SMS a las líneas de la mancha que cumplan con las condiciones descritas anteriormente. En este SMS se les indicará la cantidad de Millas LATAM Pass que recibirán, la fecha de entrega y condiciones de la misma. </li>
                            <li>En caso el titular de la línea no sea socio activo LATAM Pass, tendrá hasta el <b>02 de enero </b>de 2019 para registrarse como tal. </li>
                            <li>El cálculo de la cantidad de millas LATAM Pass a entregar se realizará según la tabla del punto VI.</li>
                          </ul>
                        </li>
                        <li>Condiciones aplicables a la entrega del beneficio de Bono de GB
                          <ul>
                            <li>Las líneas deberán estar activas para recibir el beneficio de Bono de GB. El bono de GB no utilizado durante ese período en el que la línea no estuvo activa, no podrá ser recuperado.</li>
                            <li>La entrega de GB se realizará durante 12 periodos consecutivos.</li>
                            <li>Los GB entregados durante cada período tendrán una vigencia de 31 días.</li>
                            <li>Los GB no son acumulables.</li>
                            <li>El cálculo de la cantidad de GB a entregar se realizará según la siguiente tabla:
                              <ul>
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
                              </ul>
                            </li>
                            <li>Mensualmente, se validará la cantidad de líneas de la mancha que cumplen las condiciones y, en función de ello, se calculará la cantidad de GB que será entregada durante cada período, y se les notificará vía SMS.</li>
                            <li>En los planes ilimitados, el beneficio de bono de GB se entregará en cada ciclo de facturación durante 12 periodos, y será utilizado para incrementar la cantidad de GB calculados previa a la reducción de velocidad de internet.</li>
                          </ul>
                        </li>
                        <li>Condiciones aplicables a la entrega del beneficio de Millas LATAM Pass
                          <ul>
                            <li>Las Millas LatamPass se entregarán a los titulares de las líneas activas que sean socios LATAM Pass.</li>
                            <li>En caso el titular de la línea no sea socio activo LATAM Pass, tendrá hasta el 2 de enero de 2019 para registrarse como tal. </li>
                            <li>El cálculo de la cantidad de millas a entregar se realizará según la siguiente tabla:
                              <ul>
                                <table>
                                  <tr>
                                    <td>Cantidad de Personas </td>
                                    <td>Millas</td>
                                  </tr>
                                  <tr>
                                    <td>2 </td>
                                    <td rowspan="3">1000</td>
                                  </tr>
                                  <tr>
                                    <td>3 </td>
                                  </tr>
                                  <tr>
                                    <td>4 </td>
                                  </tr>
                                  <tr>
                                    <td>5 </td>
                                    <td rowspan="3">2000</td>
                                  </tr>
                                  <tr>
                                    <td>6 </td>
                                  </tr>
                                  <tr>
                                    <td>7 </td>
                                  </tr>
                                  <tr>
                                    <td>8 </td>
                                    <td rowspan="3">3000</td>
                                  </tr>
                                  <tr>
                                    <td>9 </td>
                                  </tr>
                                  <tr>
                                    <td>10 </td>
                                  </tr>
                                </table>
                              </ul>
                            </li>
                          </ul>
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
@endsection
