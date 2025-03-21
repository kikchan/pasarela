@extends('principal')

@section('includes')
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">                
  <link href="{{ asset('css/comercio.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ticket.css') }}" rel="stylesheet">
@endsection

@section('menu')
  @include('tecnico/menuTecnico')
@endsection

@section('contenido')
<div class="container-contenido">
    <nav class="navbar" style="background-color: #2e353d;height: 50px">
      <a class="navbar-brand" style="padding-top: 0px;color: white">Listado tickets</a>
    </nav>

<!-- Buscador -->
<form method="GET" action="{{ route('ticketsT') }}">
    @include('tecnico.Ticket.partials.searchbar')
</form>

@if ($tickets != null && count($tickets) > 0 )
<span> Tickets a atender: {{count($allTickets)}}</span>
<table class="table table-bordered table-striped table-hover" border="1" cellspacing="1" cellpadding="5">
<thead>
    <tr>
        <th style="text-align: center;">ID</th>
        <th>Asunto</th>
        <th>&nbsp;</th>
    </tr>
</thead>
<tbody>
    @foreach ($tickets as $d)
        <tr>
            <td style="text-align: center;">{{$d->id}}</td>
            
            <!-- Adaptar el color del ticket en función del estado -->
            <?php  
                $color = ''; 
                if($d->idEstado == 1)
                {
                    $color = '#66ffff';
                }
                else if($d->idEstado == 2)
                {
                    $color = '#ffff66';
                }
                else if($d->idEstado == 3)
                {
                    $color = '#33ff33';
                }
                else if($d->idEstado == 4)
                {
                    $color = '#ff3333';
                }
                else if($d->idEstado == 6)
                {
                    $color = 'gray';
                }
            ?>
            <td style="background-color: {{$color}}; text-align: left; font-size: medium; font-weight: bold; color: black;">{{$d->asunto}}</td>

            <td> <a class="btn btn-info" href="{{ route('detallesTicketT', $d->id) }}">Detalles</a></td>
        <tr>
    @endforeach
</tbody>
</table>
<!-- Links de paginación -->
<div class="pagination">
    {{ $tickets->appends(['search' => Request::input('search')])->links() }}
</div>
@elseif (count($allTickets) > 0)
    <div class="alert alert-warning">No hay resultados para esta b&uacute;squeda.</div>
@else
    <div class="alert alert-warning">No hay tickets que atender.</div>
@endif

</div>
@endsection

@section('js')
@endsection