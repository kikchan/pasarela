@extends('principal')

@section('includes')
<!--<link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->        
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<div class="container-contenido">
<nav class="navbar" style="background-color: #2e353d;height: 50px">
            <a class="navbar-brand" style="padding-top: 0px;color: white">Crear valoracion</a>
        </nav>
    <div class="form-group">
        </br>
        <form method="POST" action="crearValoracion">    
             @csrf
            <label for="exampleInputEmail1">Técnico a valorar: {{$nombreTecnico}}</label>
            <input type="hidden" name="idTecnico" value="{{$idTecnico}}">
            </br>
          <label for="exampleInputEmail1">Comentario</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3" required></textarea>
          <div style="height:75px">
             <label for="exampleInputEmail1">Valoración:</label>
              <p class="valoracion" style="margin-left:-150px;position:absolute">
                <input  height:90px" id="radio1" type="radio" name="estrellas" value="5" required><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="4" required><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3" required><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="2" required><!--
                --><label for="radio4">★</label><!--
                --><input  id="radio5" type="radio" name="estrellas" value="1" required><!--
                --><label for="radio5">★</label>
              </p>
          </div>
			</br>
            <input type="submit" class="btn btn-success" value="Crear"></button>
                <input type="button" class = "btn btn-danger"value="Cancelar" onclick = "location='/comercio-soporte/valoracionesComercio'"/>
        </form>
    
    </div>
</div>
@endsection