@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ticket.css') }}" rel="stylesheet">
@endsection

@section('menu')
  @include('admin/menu')
@endsection

@section('contenido')
<div class="container-contenido">

<h2>Detalles de Ticket</h2>

@if (isset($ticket))
<table class="table table-bordered table-striped table-hover" border="1" cellspacing="1" cellpadding="5">
<thead>
    <tr>
        <th>ID</th>
        <th>Asunto</th>
        <th>Estado</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{$ticket->id}}</td>
        <td>{{$ticket->asunto}}</td>
        <td>{{$ticket->_idEstado->descripcion}}</td>
    <tr>
</tbody>
</table>
<br>
<!-- Gestión del ticket -->
@if ($ticket->_idEstado->id != 6)
    <form method="POST" action="{{ route('cerrarTicket', $ticket->id) }}">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
        <button class="btn btn-default">Cerrar ticket</button>
	</form>
    <br>
@endif

<!-- Mostrar notificación si acabamos de cerrar el ticket -->
@if (isset($ticketCerrado))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="font-size: 0.9rem;"><span aria-hidden="true">&times;</span></button>
        Ticket {{$ticket->_idEstado->descripcion}} satisfactoriamente.
    </div>
@endif

@if ($ticket->mensajes != null && count($ticket->mensajes) > 0) 
    <span class="info"> Mensajes: {{count($ticket->mensajes)}} </span> <br><br>
    <div class="row">
    <div class="col-sm-6" style="padding-right:0px"><div class="card" style="background-color:lime;">Comercio: {{$ticket->_idComercio->nombre}} {{$ticket->_idComercio->apellidos}} ({{$ticket->_idComercio->nick}})</div></div>
    <div class="col-sm-6" style="padding-left:0px"><div class="card" style="background-color:yellow;">T&eacute;cnico: {{$ticket->_idTecnico->nombre}} {{$ticket->_idTecnico->apellidos}} ({{$ticket->_idTecnico->nick}})</div></div>
    @foreach ($ticket->mensajes as $d)
        @if($d->_idUsuario->esComercio)
            <div class="col-sm-6" style="padding-right:0px"><div class="card" style="background-color:lavender;">{{$d->comentario}}</div></div>
            <div class="col-sm-6" style="width: 100%;"></div>
            <div class="col-sm-6" style="padding-right:0px;"><div class="card" style="background-color:blanchedalmond; text-align: left;">{{$d->created_at->format('d M Y | H:i:s')}}</div></div>
            <div class="col-sm-6" style="width: 100%; margin-bottom: 10px;"></div>
        @elseif($d->_idUsuario->esTecnico)
            <div class="col-sm-6"></div>
            <div class="col-sm-6" style="padding-left:0px"><div class="card" style="background-color: #05728f; color: #fff;">{{$d->comentario}}</div></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6" style="padding-left:0px; margin-bottom: 10px;"><div class="card" style="background-color: blanchedalmond; text-align: right;">{{$d->created_at->format('d M Y | H:i:s')}}</div></div>
        @endif
    @endforeach
    </div>
@else
    <div class="alert alert-info">No hay mensajes</div>
@endif

@else
    <div class="alert alert-warning">El ticket no existe admin</div>
@endif
</div>
@endsection

@section('js')
@endsection