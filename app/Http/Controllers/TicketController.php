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

	/*
	public function detail($id)
	{
		$res = "";
		
		$cliente = Cliente::find($id);
		
		if($cliente)
		{
			$res="<table>"; $res.="<tr>";
			$res.="<td>ID:</td><td>" . $cliente->nombre . "</td>";
		}
		//$res .= 
    }
    */
}
