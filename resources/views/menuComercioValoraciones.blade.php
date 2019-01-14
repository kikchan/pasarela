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

            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class=""></i> BackOffice <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="#">General</a></li>
                <li><a href="#">Buscador</a></li>
                <li><a href="pedidos">Pedidos</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#new" class="collapsed active">
                <a href="#"><i class=""></i> Soporte <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li><a href="#">Listado</a></li>
                <li><a href="#">Buscador</a></li>
                <li><a href="#">Ticket</a></li>
                <li><a href="#">Valoraciones</a></li>
                <li><a href="#">Técnicos</a></li>
                <li><a href="#">Valorar al técnico</a></li>
            </ul>
        </ul>
    </div>
</div>

<div class="container-contenido">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">
    Cras justo odio
  </a>
  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
</div>
</div> 
    <!--@yield('contenido')-->

</body>