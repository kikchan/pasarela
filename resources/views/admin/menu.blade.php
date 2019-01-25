<div class="nav-side-menu">
    <div class="brand">Menu</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
    <div class="menu-list"> 
        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#products" class="collapsed">
                <a class="li-link-full" href="#"><i class=""></i> Cuentas <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li><a href="/administrador/listadoCuentas">Listado</a></li>
                <li><a href="/administrador/crearCuenta">Crear cuenta</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a class="li-link-full" href="#"><i class=""></i> Soporte (tickets)<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li><a href="{{ route('tickets') }}">Listado</a></li>
            </ul>
			
			<ul class="sub-menu collapse" id="new">
                <li><a href="{{ route('valoracionesAdministrador') }}">Valoraciones técnicos</a></li>
            </ul>

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