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
                    <a href="valoracionesTecnico"><i class=""></i> Mis Valoraciones </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-contenido">
        <ul class="list-group">
            @if($listaValoraciones != null)
                @foreach($listaValoraciones as $valoracion)
                    @foreach($usuarios as $tecnico)  
                        @if($tecnico->id == $valoracion->idTecnico)    
                            <a onclick="javascript:expandir('{{$valoracion->id}}')" class="list-group-item list-group-item-action">
                                 <font size="3">
                                    <strong> Técnico valorado: {{$tecnico->nombre}}<br/> 
                                    Comentario: {{$valoracion->comentario}}</strong>
                                </font>
                                    <div id="{{$valoracion->id}}" style="display:none">
                                     <hr class="style2">
                                    <font size="3">
                                    Comercio id: {{$valoracion->idComercio}}<br/> 
                                    Nombre completo del técnico: {{$tecnico->nombre}} {{$tecnico->apellidos}}<br/> 
                                    Email técnico: {{$tecnico->email}} <br/> 
                                    Nick técnico: {{$tecnico->nick}}
                                    </font>
                                </div>

                                @for($i=0;$i < $valoracion->valoracion;$i++)
                                                            
                                    <div class="valoracionMuestra">
                                        
                                        <label for="radio1">★</label>
                                    </div>
                                @endfor
                             </a>
                                
                        @endif
                    @endforeach
                @endforeach
            @else
                <strong>jodete</strong>
            @endif
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