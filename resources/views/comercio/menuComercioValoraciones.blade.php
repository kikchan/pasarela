@extends('principal')

@section('includes')
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">  
<!--<link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->      
     
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
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
									<input type="submit" class="btn btn-primary" value ="Añadir valoración"></button>
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
                                                <br/>
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
@endsection