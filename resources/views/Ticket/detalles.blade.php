@extends('principal')

<h2>Detalles de Ticket</h2>
@if ($ticket != null)
<ul>
    <li>Ticket nº {{$ticket->id}} | {{$ticket->asunto}}:</li> 
    <li style="margin-left:1em">Estado: {{$ticket->_idEstado->id}} {{$ticket->_idEstado->descripcion}} {{$ticket->_idEstado}}</li>
    @if ($ticket->_idTransaccion != null) 
        <li style="margin-left:2em">Transaccion: {{$ticket->_idTransaccion->id}} <span style="color: #0000ff;">{{$ticket->_idTransaccion->importe}}</span> <span style="color: #999999;">{{$ticket->_idTransaccion->comentario}}</span></li>
    @endif
    <li style="margin-left:3em">Comercio: {{$ticket->idComercio}} {{$ticket->_idComercio}}</li>
    <li style="margin-left:3em">Tecnico: {{$ticket->idTecnico}} {{$ticket->_idTecnico}}</li>
</ul>
@else
    <div class="alert alert-warning">El ticket no existe</div>
@endif
