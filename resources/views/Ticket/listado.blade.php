@extends('principal')

<h2>Listado de Tickets</h2>
@if ($tickets != null && count($tickets) > 0 )
<span class="small"> Total listado: {{count($tickets)}} </span>
<br><br>
<table class="table table-bordered table-striped table-hover" border="1" cellspacing="1" cellpadding="5">
<thead>
    <tr>
        <th style="text-align: center;">ID</th>
        <th>Descripcion</th>
        <th>&nbsp;</th>
    </tr>
</thead>
<tbody>
    @foreach ($tickets as $d)
        <tr>
            <td style="text-align: center;">{{$d->id}}</td>
            <td>{{$d->asunto}}</td>
            <td> <button class="btn btn-sm btn-info">Detalles</button></td>
        <tr>
    @endforeach
</tbody>
</table>
@else
    <div class="alert alert-warning">No hay tickets en la BB.DD.</div>
@endif
