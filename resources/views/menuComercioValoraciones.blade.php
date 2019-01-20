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
        <ul class="list-group">
            @if($listaTickets != null)
                @foreach($listaTickets as $ticket)
                    @foreach($usuarios as $usuario)  
                        @if($usuario->id == $ticket->idTecnico)
                        <form action="valoraciones/crearValoracionComercio" method="POST" role="form">    
                            {{ csrf_field( )}}
                            <a class="list-group-item list-group-item-action">
                                 <font size="3">
                                    <strong> Técnico asignado:</strong> {{$usuario->nombre}}<br/> 
                                    <strong>Problema:</strong> {{$ticket->asunto}}<br/> 
                                    
                                    @foreach($estados as $estado)
                                        @if($estado->id == $ticket->idEstado)
                                            <strong>Estado ticket: </strong>{{$estado->descripcion}}<br/> 
                                        @endif
                                    @endforeach
                                    <strong>Tecnico id: </strong>{{$usuario->id}}<br/> 
                                    <strong>Nombre completo del técnico: </strong>{{$usuario->nombre}}  {{$usuario->apellidos}}<br/> 
                                    <strong>Email técnico: </strong>{{$usuario->email}} <br/> 
                                    <br/> 
                                    </font>
                                    <button type="submit" align="right" class="btn btn-primary">Añadir valoración</button>
                                    <input type="button" class = "btn btn-secondary"value="Ver valoraciones" onclick = "javascript:expandir('{{$ticket->id}}')"/>
                                        <div id="{{$ticket->id}}" style="display:none">
                                            @foreach($valoraciones as $valoracion)
                                                @if($valoracion->idTecnico == $usuario->id)
                                                 <hr class="style2">
                                                      <font size="3">
                                                    <strong>Nombre completo del técnico:</strong> {{$usuario->nombre}} {{$usuario->apellidos}}<br/> 
                                                    <strong>Email técnico: </strong>{{$usuario->email}} <br/> 
                                                    <strong>Comentario: </strong>{{$valoracion->comentario}} <br/>
                                                    <strong>Valoracion:</strong>
                                                    </font>
                                                        @for($i=0;$i < $valoracion->valoracion;$i++)                 
                                                            <div class="valoracionMuestra">
                                                                <label for="radio1">★</label>
                                                            </div>
                                                        @endfor
                                                    </br>
                                                @endif
                                            @endforeach
                                            <hr class="style2">
                                        </div>
                             </a>
                             <input type="hidden" name="idTecnico" value="{{$usuario->id}}">
                             <input type="hidden" name="nombreTecnico" value="{{$usuario->nombre}}">

                        </form>      
                       
                        @endif
                    @endforeach
                @endforeach
            @endif
        </ul>
           


    </div>

    </div>
        @yield('contenido')

</body>
<script language="JavaScript1.2">
                                function expandir(quien){
                                var capa = document.getElementById(quien);
                                if(capa.style.display=='')
                                capa.style.display='none';
                                else
                                capa.style.display='';
                                }
                                </script>