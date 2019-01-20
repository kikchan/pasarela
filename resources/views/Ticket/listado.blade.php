@extends('principal')

@section('menu')
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
            <td> <button onclick="detalle({{$d->id}})" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detallesTicket">Detalles</button></td>
        <tr>
    @endforeach
</tbody>
</table>
<div class="modal" tabindex="-1" role="dialog" id="detallesTicket">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle de un ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detallesTicket_body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@else
    <div class="alert alert-warning">No hay tickets en la BB.DD.</div>
@endif

@endsection

@section('js')
<script>
function detalle(id)
{
	$.ajax({
		url: "{{route('detalle_ajax', ['id'=>''])}}/" + id,
		method: 'GET'
		}).done(function(data)
        {
			$("#detallesTicket_body").html(data);
			$("#detallesTicket").modal('show');
		});
}
</script>
@endsection