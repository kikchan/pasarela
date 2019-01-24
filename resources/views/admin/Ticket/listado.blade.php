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

<h2>Listado de Tickets</h2>

<!-- Buscador -->
<form method="GET" action="{{ route('tickets') }}">
    @include('admin.Ticket.partials.searchbar')
</form>

@if ($tickets != null && count($tickets) > 0 )
<span> Total listado: {{count($allTickets)}}</span>
<br><br>
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

            <td> <a class="btn btn-info" href="{{ route('detalles', $d->id) }}">Detalles</a></td>
        <tr>
    @endforeach
</tbody>
</table>
<!-- Links de paginación -->
<div class="pagination">
    {{ $tickets->appends(['sort' => Request::input('sort')])->links() }}
</div>

@else
    <div class="alert alert-warning">No hay tickets en la BB.DD.</div>
@endif

</div>
@endsection