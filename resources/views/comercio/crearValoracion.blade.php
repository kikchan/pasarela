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
                <li><a href="valoracionesComercio">Técnicos</a></li>
            </ul>
        </ul>
    </div>
</div>

<div class="container-contenido">
    <div class="form-group">
        </br>
        <form method="POST" action="crearValoracion">    
             @csrf
            <label for="exampleInputEmail1">Nombre técnico</label>
            <input type="hidden" name="idTecnico" value="{{$idTecnico}}">
            <input type="email" class="form-control" id="exampleInputEmail1" name="nombreTecnico"aria-describedby="emailHelp" placeholder="{{$nombreTecnico}}" readonly>
            </br>
          <label for="exampleInputEmail1">Comentario</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3" required></textarea>
          <div style="height:75px">
             <label for="exampleInputEmail1">Valoración:</label>
              <p class="valoracion" style="margin-left:10px;position:absolute">
                <input style="opacity: 0!important;z-index:-1!important" id="radio1" type="radio" name="estrellas" value="5" required><!--
                --><label for="radio1">★</label><!--
                --><input style="opacity: 0!important;z-index:-1!important" id="radio2" type="radio" name="estrellas" value="4" required><!--
                --><label for="radio2">★</label><!--
                --><input style="opacity: 0!important;z-index:-1!important" id="radio3" type="radio" name="estrellas" value="3" required><!--
                --><label for="radio3">★</label><!--
                --><input style="opacity: 0!important;z-index:-1!important" id="radio4" type="radio" name="estrellas" value="2" required><!--
                --><label for="radio4">★</label><!--
                --><input style="opacity: 0!important;z-index:-1!important" id="radio5" type="radio" name="estrellas" value="1" required><!--
                --><label for="radio5">★</label>
              </p>
          </div>

            <button type="submit" class="btn btn-success">Crear</button>
                <input type="button" class = "btn btn-danger"value="Cancelar" onclick = "location='/valoracionesComercio'"/>
        </form>
    
    </div>
</div>

    @yield('contenido')
</body>