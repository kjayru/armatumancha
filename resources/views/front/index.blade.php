
@extends('layout.master')
@section('content')
<div class="layout" id="app">
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
                      <div class="info">
                        <p>¡Recuerda! Tienes hasta el <span>5 enero del 2019 </span>para registrar tu mancha.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="section2">
                <div class="section2__align">
                  <div class="section2__main">
                    <div class="title">
                      <h2>¡Elige entre!</h2>
                    </div>
                    <div class="content">
                      <div class="content__item">
                        <blockquote><a href="/arma-tu-mancha">
                            <figure>
                              <h4>Arma tu mancha</h4><img src="assets/pg1_img4.svg" alt=""/>
                            </figure>
                            <figcaption>
                              <h5>Sé el líder y registrar<br/>a tu mancha</h5>
                            </figcaption></a></blockquote>
                      </div>
                      <div class="content__arrow"></div>
                      <div class="content__item">
                        <blockquote><a href="/mira-el-status-de-tu-mancha">
                            <figure>
                              <h4>Mira el status<br/>de tu mancha</h4><img src="assets/pg1_img5.svg" alt=""/>
                            </figure>
                            <figcaption>
                              <h5>Si ya eres parte de una mancha,<br/>mira cómo van</h5>
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
                      <p>Cámbiate a Claro, renueva o pásate de Prepago a Postpago<br/> y llévate un <span>súper bono </span> de hasta <span>10 GB </span> por línea durante 1 año</p>
                      <p>Cámbiate a Claro, renueva o pásate de    Prepago a Postpago y llévate un súper bono  </p>
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
                          <div class="image"><img src="assets/pg1_img28.svg" alt=""/></div>
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
                          <div class="image"><img src="assets/pg1_img17.svg" alt=""/></div>
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
                    <!--.title: h2 ¿En qué consiste?-->
                    <!--.subtitle: h3 Arma tu mancha y elige descuento en equipos o un súper bono de gigas-->
                  </div>
                  <div class="section3__main">
                    <div class="image"><img src="assets/pg1_logo_latam.svg" alt=""/></div>
                    <div class="title">
                      <h2>Bono de Millas LATAM Pass</h2>
                      <p>Cámbiate a Claro, renueva o pásate de Prepago a Postpago con un plan <br/><span>Max Internacional 59.90  </span> y llévate hasta  <span> 4000 </span><span> Millas LATAM Pass  </span> para ti y tu mancha </p>
                      <p>Cámbiate a Claro, renueva o pásate de Prepago a Postpago desde el plan Max Internacional 59.90</p>
                      <h3>A más miembros, ¡más Millas LATAM Pass!</h3>
                    </div>
                    <div class="list">
                      <ul id="list3">
                        <li>
                          <blockquote>
                            <h5>10 miembros </h5>
                          </blockquote>
                          <blockquote>
                            <div>
                              <!--h6 hasta-->
                              <h3> 4000</h3>
                              <h3>4,000</h3><span>Millas
                                <!--span dto.--></span>
                              <!--p x 12 meses-->
                            </div>
                          </blockquote>
                        </li>
                        <li>
                          <blockquote>
                            <h5>8 a 9 miembros</h5>
                          </blockquote>
                          <blockquote>
                            <div>
                              <!--h6 hasta-->
                              <h3> 3000</h3>
                              <h3> 3,000</h3><span>Millas
                                <!--span dto.--></span>
                              <!--p x 12 meses-->
                            </div>
                          </blockquote>
                        </li>
                        <li>
                          <blockquote>
                            <h5>6 a 7 mimebros</h5>
                          </blockquote>
                          <blockquote>
                            <div>
                              <!--h6 hasta-->
                              <h3>2000</h3>
                              <h3>2,000</h3><span>Millas
                                <!--span dto.--></span>
                              <!--p x 12 meses-->
                            </div>
                          </blockquote>
                        </li>
                        <li>
                          <blockquote>
                            <h5>4 a 5 mimebros</h5>
                          </blockquote>
                          <blockquote>
                            <div>
                              <!--h6 hasta-->
                              <h3>1500</h3>
                              <h3>1,500</h3><span>Millas
                                <!--span dto.--></span>
                            </div>
                          </blockquote>
                        </li>
                        <li>
                          <blockquote>
                            <h5>2 a 3 miembros</h5>
                          </blockquote>
                          <blockquote>
                            <div>
                              <!--h6 hasta-->
                              <h3> 1000</h3>
                              <h3> 1,000</h3><span>Millas
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
              <!--section.section4
              .section4__align
                  .section4__main
                      .image
                          img(src=path+'assets/pg1_img29.svg' alt='')
                      .title: h2 ¡Te puedes llevar estos equipos!
                      .list
                          .item
                              .title
                                  h3 Astronomy Or
                                      br
                                      | Astrology
                              .image
                                  img(src=path+'assets/Huawei_Mate_P20_Pro.png' alt='')

                              .info
                                  p The Basics Of Buying A Telescope
                                      br
                                      | ing A Telescope

                          .item
                              .title
                                  h3 Astronomy Or
                                      br
                                      | Astrology
                              .image
                                  img(src=path+'assets/Huawei_Mate_P20_Pro.png' alt='')

                              .info
                                  p The Basics Of Buying A Telescope
                                      br
                                      | ing A Telescope


                          .item
                              .title
                                  h3 Astronomy Or
                                      br
                                      | Astrology
                              .image
                                  img(src=path+'assets/Huawei_Mate_P20_Pro.png' alt='')

                              .info
                                  p The Basics Of Buying A Telescope
                                      br
                                      | ing A Telescope


                          .item
                              .title
                                  h3 Astronomy Or
                                      br
                                      | Astrology
                              .image
                                  img(src=path+'assets/Huawei_Mate_P20_Pro.png' alt='')

                              .info
                                  p The Basics Of Buying A Telescope
                                      br
                                      | ing A Telescope

                          .item
                              .title
                                  h3 Astronomy Or
                                      br
                                      | Astrology
                              .image
                                  img(src=path+'assets/Huawei_Mate_P20_Pro.png' alt='')

                              .info
                                  p The Basics Of Buying A Telescope
                                      br
                                      | ing A Telescope

                      .links
                          a(href="#") Ir a Tienda
              -->
              <!--section.section5
              .section5__align
                  .section5__main
                      .title
                          p Y si tienes un plan CHIP Max Internacional, ¡llévate un súper bono!
                              br
                              strong ¡A más amigos, ganas más gigas por línea!
                      .content
                          .content__item
                              blockquote
                                  figure
                                      img(src=path+'assets/pg1_people1.jpg' alt='')
                                  figcaption
                                      h6 3 amigos
                                      h3 3GB
                                      p x 12 meses
                          .content__arrow
                          .content__item
                              blockquote
                                  figure
                                      img(src=path+'assets/pg1_people2.jpg' alt='')
                                  figcaption
                                      h6 6 amigos
                                      h3 6GB
                                      p x 12 meses
                          .content__arrow
                          .content__item
                              blockquote
                                  figure
                                      img(src=path+'assets/pg1_people3.jpg' alt='')
                                  figcaption
                                      h6 10 amigos
                                      h3 10GB
                                      p x 12 meses



              -->
              <section class="section6">
                <div class="section6__align">
                  <div class="section6__main">
                    <div class="content">
                      <h4>¡Comparte la promo con tu <span>mancha!</span></h4><span><a href="#" target="_blank"><img src="assets/pg1_ico_facebook.svg" alt=""/></a><a href="#" target="_blank"><img src="assets/pg1_ico_whatsapp.svg" alt=""/></a></span>
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
                          <li>Los países incluidos son: Ecuador, Colombia, Chile, Argentina, Brasil, Costa Rica, El Salvador, Guatemala, Honduras, México, Nicaragua, Panamá, Paraguay, Puerto Rico, República Dominicana y Uruguay.</li>
                          <li>A partir del plan Max Internacional Ilimitado 189 y superiores se incluye Estados Unidos (considerando Alaska, Hawái e Islas Vírgenes) en la Cobertura Sin Frontera.</li>
                          <li>Para poder utilizar minutos, SMS y MB, sólo deberás contar con un plan Max Internacional. De lo contario, a este consumo le serán aplicadas las tarifas Roaming vigentes.</li>
                          <li>Cuando llegues a tu país de destino configura tu equipo activando la opción de “Itinerancia de datos” o “Roaming de datos” en la sección “Ajustes”. Si tienes un inconveniente comunícate gratis desde tu móvil Claro a Atención al Cliente: +51997990123.</li>
                          <li>En caso cuentes con un paquete de Roaming activo y estés en un país Sin Frontera, el tráfico que realices no se descontará de las unidades libres del paquete contratado, únicamente aplicarán las condiciones tarifarias del plan Max Internacional. La vigencia del Paquete Roaming se mantendrá (no se suspende).</li>
                          <li>Serán descontados de los minutos disponibles de tu plan con Cobertura Sin Frontera, las siguientes llamadas:
                            <ul>
                              <li>Llamadas realizadas dentro del Perú a móviles y fijos nacionales.</li>
                              <li>Llamadas realizadas desde el país Sin Frontera visitado a los móviles y fijos del mismo país.</li>
                              <li>Llamadas realizadas desde el país Sin Frontera visitado a móviles y fijos de Perú.</li>
                              <li>Llamadas entrantes de cualquier destino mientas se encuentre en alguno de los países Sin Frontera.</li>
                            </ul>
                          </li>
                          <li>La cuota de megas de tu plan sirve para navegar en Internet (WAP y WEB).</li>
                          <li>La cuota de SMS de tu plan sirve para enviar mensajes de texto a móviles del país visitado y hacia cualquier destino internacional.</li>
                          <li>No incluye números rurales ni satelitales para ninguno de los destinos mencionados anteriormente.</li>
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
