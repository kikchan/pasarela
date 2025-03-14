@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ticket.css') }}" rel="stylesheet">
@endsection

@section('menu')
  @include('comercio/menuComercio')
@endsection

@section('contenido')
<div class="container-contenido">
    <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Detalles ticket</a>
    </nav>

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
<!-- Mostrar notificación si acabamos de enviar un mensaje -->
@if (isset($mensajeEnviado))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="font-size: 0.9rem;"><span aria-hidden="true">&times;</span></button>
        Mensaje enviado satisfactoriamente.
    </div>
@endif

@if ($ticket->mensajes != null && count($ticket->mensajes) > 0) 
    <span class="info"> Mensajes: {{count($ticket->mensajes)}} </span> <br><br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6" style="padding-right:0px"><div class="card" style="background-color:lime;">Comercio: (Yo)</div></div>
                <div class="col-sm-6" style="padding-left:0px"><div class="card" style="background-color:yellow;">T&eacute;cnico: ({{$ticket->_idTecnico->nick}})</div></div>
                @foreach ($ticket->mensajes as $d)
                    @if($d->_idUsuario->esComercio)
                        <div class="col-sm-6" style="padding-right:0px"><div class="card" style="background-color:lavender;">{{$d->comentario}}</div></div>
                        <div class="col-sm-6" style="width: 100%;"></div>
                        <div class="col-sm-6" style="padding-right:0px;"><div class="card" style="background-color:blanchedalmond; text-align: left;">{{$d->created_at->format('d M Y | H:i:s')}}</div></div>
                        <div class="col-sm-6" style="width: 100%; margin-bottom: 10px;"></div>
                    @elseif($d->_idUsuario->esTecnico)
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6" style="padding-left:0px;"><div class="card" style="background-color: #05728f; color: #fff;">{{$d->comentario}}</div></div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6" style="padding-left:0px; margin-bottom: 10px;"><div class="card" style="background-color: blanchedalmond; text-align: right;">{{$d->created_at->format('d M Y | H:i:s')}}</div></div>
                        
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">No hay mensajes</div>
@endif
<br><br>

<!-- Gestión de mensajes -->
@if ($ticket->_idEstado->id != 6)
    <form method="POST" action="{{ route('mensajeTicketC', $ticket->id) }}">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="message">Mensaje de consulta</label>
            <textarea class="form-control" required rows="3" name="mensaje" placeholder="Escribe algo..."></textarea>
        </div>
        <span>
            <input type="submit" class="btn btn-primary" value="Contestar" />
        </span>
    </form>
@else 
<form method="POST" action="{{ route('crearValoracionComercio')}}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <input hidden class="form-control" type="text" name="idTecnico" value="{{$ticket->idTecnico}}">
    <input hidden class="form-control" type="text" name="nombreTecnico" value="{{$ticket->_idTecnico->nombre}}">

    <input class="btn btn-dark" type="submit" value="Valora a este t&eacute;cnico">
</form>
@endif

@else
    <div class="alert alert-warning">El ticket no existe comercio</div>
@endif
</div>
@endsection

@section('js')
@endsection