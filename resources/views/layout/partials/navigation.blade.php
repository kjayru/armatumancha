<div class="layout__header">
    <div class="layout__header--align">
        <h1 class="layout__header--logo"> </h1>
            <nav class="layout__header--links">
            <div class="layout__header--title">
                <h3></h3>
            </div>
        <div class="layout__header--button"></div>
            <ul>


            @guest

                <li class="normal"><a  href="{{ route('register') }}" {{{ (Request::is('register') ? 'class=active' : '') }}}> <img src="assets/menu_ico_star.svg" alt="">Arma tu mancha  </a></li>
                <li class="normal"><a href="{{ route('home.mirastatus') }}" {{{ (Request::is('mira-el-status-de-tu-mancha') ? 'class=active' : '') }}}> <img src="assets/menu_ico_consultar.svg" alt="">Consulta tu mancha  </a></li>


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
