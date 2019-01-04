<div class="layout__header">
    <div class="layout__header--align">
        <a class="layout__header--logo" href="{{ route('home.index')}}"> </a>
            <nav class="layout__header--links">
            <div class="layout__header--title">
                <h3></h3>
            </div>
        <div class="layout__header--button"></div>
            <ul>

            @guest

                <!--<li class="normal">
                    <a  href="{{ route('register') }}" {{{ (Request::is('register') ? 'class=active' : '') }}} onclick="gtag('event', 'Cambio de Tab', {  'event_category' : 'Navegacion',  'event_label' : 'Arma tu mancha'});"> <img src="assets/menu_ico_star.svg" alt="">Arma tu mancha  </a>
                </li>-->
                <li class="normal">
                    <a href="{{ route('home.mirastatus') }}" {{{ (Request::is('mira-el-status-de-tu-mancha') ? 'class=active' : '') }}} onclick="gtag('event', 'Cambio de Tab', {  'event_category' : 'Navegacion',  'event_label' : 'Consulta tu mancha'});"> <img src="assets/menu_ico_consultar.svg" alt="">Consulta tu mancha  </a>
                </li>
                <li class="normal">
                    <a  href="{{ route('home.preguntas') }}" {{{ (Request::is('preguntas-frecuentes') ? 'class=active' : '') }}} onclick="gtag('event', 'Cambio de Tab', {  'event_category' : 'Navegacion',  'event_label' : 'Preguntas Frecuentes'});"> <img src="assets/menu_ico_star.svg" alt="">Preguntas frecuentes </a>
                </li>
                <li class="normal">
                    <a  href="{{ route('home.tips') }}" {{{ (Request::is('tips') ? 'class=active' : '') }}} onclick="gtag('event', 'Cambio de Tab', {  'event_category' : 'Navegacion',  'event_label' : 'Tips'});"> <img src="assets/menu_ico_star.svg" alt="">Tips</a>
                </li>

            @else
                <li class="nav-item dropdown">

                        <a class="btnClose"  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Salir
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                </li>
            @endguest
            </ul>
        </nav>
    </div>
</div>
