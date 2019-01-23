@extends('principal')

@section('menu')
<div class="container" style="margin-top:25px">
<h2> Generador de transacciones PA$AR€LA </h2>
<form style="margin-top:25px" method="POST" action="{{ route('pgen') }}">
    @csrf
    {{ method_field('POST') }}
    <input class="form-control" style="margin-top:10px" type="text" name="web" placeholder="web">
    <input class="form-control" style="margin-top:10px" type="text" name="idPedido" placeholder="idPedido">
    <input class="form-control" style="margin-top:10px" type="text" name="key" placeholder="key">
    <input class="form-control" style="margin-top:10px" type="text" name="lista" placeholder="lista">
    <input class="form-control" style="margin-top:10px" type="text" name="precio" placeholder="precio">
    <input class="btn btn-dark" style="margin-top:10px" type="submit" value="Enviar">
</form>
</div>
@endsection