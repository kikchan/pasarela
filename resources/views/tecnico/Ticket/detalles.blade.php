@extends('menuTecnico')

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
<!-- Mostrar notificación si acabamos de modificar el estado del ticket o enviado un mensaje -->
@if (isset($ticketModificado))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Ticket {{$ticket->_idEstado->descripcion}} satisfactoriamente.
    </div>
@elseif (isset($mensajeEnviado))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Mensaje enviado satisfactoriamente.
    </div>
@endif

<!-- Gestión del ticket -->
@if ($ticket->_idEstado->id != 5)
    <form method="POST" action="{{ route('gestionarTicketT', $ticket->id) }}">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
        <div class="select-input">
            <div class="form-group">
                <label for="sel1" style="display: block;">Resoluci&oacute;n del ticket (seleccione uno):</label>
                <select required name="accion" class="form-control" style="display: inline; width: 30%; vertical-align: middle;">
                    <option hidden selected value=""> Selecciona una opci&oacute;n </option>
                    <option value="aceptar">Aceptar</option>
                    <option value="rechazar">Rechazar</option>
                    <option value="cerrar">Cerrar</option>
                </select>
                <span>
                    <input type="submit" class="btn btn-primary" value="Modificar ticket" />
                </span>
            </div>
        </div>
	</form>
    <br>
@endif

@if ($ticket->mensajes != null && count($ticket->mensajes) > 0) 
    <span class="info"> Mensajes: {{count($ticket->mensajes)}} </span> <br><br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6" style="padding-right:0px"><div class="card" style="background-color:lime;">Comercio: ({{$ticket->_idComercio->nick}})</div></div>
                <div class="col-sm-6" style="padding-left:0px"><div class="card" style="background-color:yellow;">T&eacute;cnico: (Yo)</div></div>
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
@if ($ticket->_idEstado->id != 5)
    <form method="POST" action="{{ route('mensajeTicketT', $ticket->id) }}">
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
@endif

@else
    <div class="alert alert-warning">El ticket no existe</div>
@endif
</div>
@endsection

@section('js')
@endsection