@extends('principal')

@section('menu')
<div class='container'>
@if($registro==NULL)
    <div class="alert alert-danger" style="margin-top:15px" role="alert">
        No existe la transacción o ya se ha completado. Pongase en contacto con el servicio técnico. 
    </div>
@else
    <form method="POST" action="{{$url}}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="response" value="{{$response}}">
    @if($registro!=NULL && $registro->idEstado==4)
        <div class="alert alert-warning" style="margin-top:15px" role="alert">
            Se ha producido un error. Redirigiendo automáticamente a la web. <input type="submit" class="btn btn-info" value="Volver" >
        </div>
    @endif
    @if($registro!=NULL && $registro->idEstado==3)
        <div class="alert alert-success" style="margin-top:15px" role="alert">
            Pago realizado correctamente. Redirigiendo automáticamente a la web. <input type="submit" class="btn btn-info" value="Volver">
        </div>
    @endif
    </form>
@endif
</div>

@endsection