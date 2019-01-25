@extends('principal')

@section('includes')
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">  
<link href="{{ asset('css/main.css') }}" rel="stylesheet">    
     
@endsection

@section('menu')
  @include('tecnico/menuTecnico', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
    <div class="container-contenido">
        <nav class="navbar" style="background-color: #2e353d;height: 50px">
            <a class="navbar-brand" style="padding-top: 0px;color: white">Valoración promedia</a>
        </nav>
        <ul class="list-group">
            @if($listaValoraciones != null)
                @foreach($listaValoraciones as $valoracion)
                    @foreach($usuarios as $tecnico)  
                        @if($tecnico->id == $valoracion->idTecnico)    
                            <a class="list-group-item list-group-item-action">
                                 <font size="3">
                                    <strong> Técnico valorado: {{$tecnico->nombre}}<br/> 
                                    Comentario: {{$valoracion->comentario}}</strong><br/> <br/>
                                     <input type="button" class = "btn btn-secondary"value="Ver detalles" onclick = "javascript:expandir('{{$valoracion->id}}')"/>
                                </font>
                                    <div id="{{$valoracion->id}}" style="display:none">
                                     <hr class="style2">
                                    <font size="3">
									@foreach($comercios as $comercio)
										@if($comercio->id == $valoracion->idComercio)
											<strong>Comercio nombre: </strong>{{$comercio->nombre}} {{$comercio->apellidos}}<br/> 
										@endif
									@endforeach
                                    <strong>Nombre completo del técnico:</strong> {{$tecnico->nombre}} {{$tecnico->apellidos}}<br/> 
                                    <strong>Email técnico:</strong> {{$tecnico->email}} <br/> 
                                    <strong>Nick técnico: </strong>{{$tecnico->nick}}<br/>
                                    </font>
                              

                                @for($i=0;$i < $valoracion->valoracion;$i++)
                                                            
                                    <div class="valoracionMuestra">
                                        
                                        <label for="radio1">★</label>
                                    </div>
                                @endfor
                                  </div>
                             </a>
                                
                        @endif
                    @endforeach
                @endforeach
            @endif
        </ul>
	</div>
	<div class="pagination">
    {{ $listaValoraciones->links() }}
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