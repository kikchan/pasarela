
<link href="{{ asset('css/main.css') }}" rel="stylesheet">       

<div class="nav-side-menu" style="z-index: 10">
    <div class="brand">Menu</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
    <div class="menu-list"> 
        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a class="li-link-full" href="{{ URL::to('/comercio/' . $idUsuario) }}"><i class=""></i> Dashboard</a>
            </li>
            <li>
                <a class="li-link-full" href="{{ URL::to('/comercio/' . $idUsuario . '/pagos') }}"><i class=""></i> BackOffice</a>
            </li>

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a class="li-link-full" href="#"><i class=""></i> Soporte (tickets)<span class="arrow"></span></a>
            </li>

                <ul class="sub-menu collapse" id="new">
                    <li><a href="{{ route('ticketsC') }}">Listado</a></li>
                    <li><a href="{{ route('formCrearTicket') }}">Crear ticket</a></li>
                    <li><a href="{{ route('valoracionesComercio') }}">Valoración técnicos</a></li>
                </ul>
            <li>
                <a class="li-link-full" href="{{ URL::to('/comercio/' . $idUsuario . '/wiki') }}"><i class=""></i>Wiki</a>
            </li>
            <li>
            
                <a class="li-link-full" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class=""></i>
                    {{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>