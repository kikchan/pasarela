@extends('principal')

@section('menu')
<div class='container'>
<form action="">
    <input type="hidden" name="response">
@if($registro->idEstado==4)
    <div class="alert alert-danger" style="margin-top:15px" role="alert">
        Se ha producido un error. Redirigiendo automáticamente a la web. <input type="button" class="btn btn-info" value="Volver" >
    </div>
@endif
@if($registro->idEstado==3)
    <div class="alert alert-success" style="margin-top:15px" role="alert">
        Pago realizado correctamente. Redirigiendo automáticamente a la web. <input type="button" class="btn btn-info" value="Volver">
    </div>
@endif
</form>
</div>

@endsection