@extends('principal')

@section('includes')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">         
<link href="{{ asset('css/comercio.css') }}" rel="stylesheet">       
@endsection

@section('menu')
  @include('comercio/menuComercio', ['idUsuario'=>$idUsuario])
@endsection

@section('contenido')
<div class="container-contenido" >

    <div class='container'>
    @if($registro==NULL)
        <div class="alert alert-danger" style="margin-top:15px" role="alert">
            No existe la transacción. Pongase en contacto con el servicio técnico. 
        </div>
    @else
        <form id="form" method="POST" action="{{$url}}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="response" value="{{$response}}">
        @if($registro!=NULL && $registro->idEstado==5)
            <div class="alert alert-success" style="margin-top:15px" role="alert">
                Devolucion realizado correctamente. Redirigiendo automáticamente a la web en 3 segundos. <input type="submit" class="btn btn-info" value="Volver">
            </div>
        @endif
        </form>
    @endif
    </div>
</div>
@endsection

@if($response!=NULL && $registro!=NULL && ($registro->idEstado==5))
    @section('js')
    <script>
    $(function () {
        setTimeout(function(){
            document.getElementById('form').submit();
        },3000)
    });
    </script>
    @endsection
@endif