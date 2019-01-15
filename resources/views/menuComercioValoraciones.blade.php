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
    @if($listaValoraciones != null)
        @foreach($listaValoraciones as $valoracion)  
            <a href="#" class="list-group-item list-group-item-action">
            {{$valoracion->comentario}}
            </a>
        @endforeach
    @endif
</div>
<form>
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★</label>
  </p>
</form>

</div> 
    <!--@yield('contenido')-->

</body>