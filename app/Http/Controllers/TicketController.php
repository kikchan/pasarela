<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use View;

class TicketController extends Controller
{
    public function listado()
    {
        $tickets = Ticket::orderBy('id')->get();
		return View::make("Ticket/listado")->with('tickets', $tickets);
	}
	
    public function detalles($id)
    {
		$ticket = Ticket::find($id);
		return View::make("Ticket/detalles")->with('ticket', $ticket);
	}
	
	public function ajax_detalle($id)
	{
		$res = "";
		
		$ticket = Ticket::find($id);
		
		if($ticket)
		{
			$res="<table>"; $res.="<tr>";
			$res.="<td>Asunto:</td><td>" . $ticket->asunto . "</td>";
			$res.="</tr>"; $res.="</table>";
		}
		return $res;
	}
}
