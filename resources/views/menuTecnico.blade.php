@include('principal')

<body>
<div class="nav-side-menu">
    <div class="brand">Menu</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
    <div class="menu-list"> 
        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="#"><i class=""></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class=""></i> Perfil del Soporte</a>
            </li>

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class=""></i> Tickets<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li><a href="#">Listado</a></li>
                <li><a href="#">Buscador</a></li>
                <li><a href="#">Ticket</a></li>
            </ul>

            <li>
                <a href="/valoracionesTecnico"><i class=""></i> Mis Valoraciones </a>
            </li>
        </ul>
    </div>
</div>
    @yield('contenido')
</body> 