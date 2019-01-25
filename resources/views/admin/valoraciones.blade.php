@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">

  <script type="text/javascript">
    document.getElementById('li-dashboard').classList.add("collapsed active")
  </script>
@endsection

@section('menu')
  @include('admin/menu')
@endsection

@section('contenido')
  
   <div class="container-contenido">
   <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Listado valoraciones</a>
    </nav>
       <ul class="list-group">
            @if($listaValoraciones != null)
                @foreach($listaValoraciones as $valoracion)
                    @foreach($usuarios as $usuario)  
                        @if($usuario->id == $valoracion->idTecnico)
                        <form action="valoracionesAdministrador/borrarComentario" method="POST" role="form">    
                            {{ csrf_field( )}}
                            <a class="list-group-item list-group-item-action">
                                 <font size="3">
                                    <strong> Técnico valorado:</strong> {{$usuario->nombre}}<br/> 
                                    <strong>Comentario:</strong> {{$valoracion->comentario}}<br/> 
                                    <strong>Tecnico id: </strong>{{$usuario->id}}<br/> 
                                    <br/> 
                                    </font>
                                    <input type="submit" align="right" class="btn btn-danger" style="color:#FF0000;" value="Borrar"></button>
                                    <input type="button" class = "btn btn-secondary"value="Ver detalles" onclick = "javascript:expandir('{{$valoracion->id}}')"/>
                                        <div id="{{$valoracion->id}}" style="display:none">
                                                 <hr class="style2">
                                                      <font size="3">
                                                    <strong>Nombre completo del técnico:</strong> {{$usuario->nombre}} {{$usuario->apellidos}}<br/> 
                                                    <strong>Email técnico: </strong>{{$usuario->email}} <br/> 
                                                    </font>
                                                        @for($i=0;$i < $valoracion->valoracion;$i++)                 
                                                            <div class="valoracionMuestra">
                                                                <label for="radio1">★</label>
                                                            </div>
                                                        @endfor
                                            <hr class="style2">
                                        </div>
                             </a>
                             <input type="hidden" name="id" value="{{$valoracion->id}}">
                        </form>      
                       
                        @endif
                    @endforeach
                @endforeach
            @endif
        </ul>
	<div class="pagination">
    {{ $listaValoraciones->links() }}
		</div>
    </div>



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