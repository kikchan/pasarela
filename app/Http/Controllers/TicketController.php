<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Ticket;
use App\User;
use App\Transaccion;

use Illuminate\Http\Request;
use View;

class TicketController extends Controller
{
    // ===== ADMINISTRADOR =====
    public function listado(Request $request)
    {
        $tickets = Ticket::orderBy('id')->get();
        $allTickets = Ticket::all();

        // Si venimos de la barra de búsqueda...
        if ($request->has('search')) {
            // Obtenemos la palabra buscada
            $keyword = $request->input('search');
            $tickets = Ticket::SearchByKeyword($keyword)->paginate(5);
        } else {
            $tickets = Ticket::paginate(5);
        }
        return View::make("admin/Ticket/listado")->with(compact('tickets', 'allTickets'));
    }

    public function detalles($id)
    {
        $ticket = Ticket::find($id);
        return View::make("admin/Ticket/detalles")->with('ticket', $ticket);
    }

    // Función para actualizar el estado por un administrador
    public function cerrarTicket($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket) {
            // El estado 5 representa "cerrado"
            Ticket::where('id', $id)->update(array('idEstado' => '5'));
            $ticket = Ticket::findOrFail($id);
            return View::make("admin/Ticket/detalles")->with('ticket', $ticket);
        }
    }

    // ===== TECNICO =====
    public function listadoTecnico(Request $request)
    {
        $userID = $request->user()->id;
        $allTickets = Ticket::where('idTecnico', '=', $userID)->get();

        // Si venimos de la barra de búsqueda...
        if ($request->has('search')) {
            // Obtenemos la palabra buscada
            $keyword = $request->input('search');
            $tickets = Ticket::where('idTecnico', '=', $userID)->SearchByKeyword($keyword)->paginate(5); // CAMBIAR 3 por ID usuario logueado
        } else {
            $tickets = Ticket::where('idTecnico', '=', $userID)->paginate(5);
        }
        return View::make("tecnico/Ticket/listado")->with(compact('tickets', 'allTickets'));
    }

    public function detallesTecnico($id)
    {
        $ticket = Ticket::find($id);
        return View::make("tecnico/Ticket/detalles")->with('ticket', $ticket);
    }

    public function gestionarTicketT(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket) {
            // Obtener la acción a aplicar al ticket
            $nuevoEstado = $request->input('accion');

            // Diccionario de estados CAMBIAR GLOBAL
            $estados =
                [
                "esperar" => 2,
                "aceptar" => 3,
                "rechazar" => 4,
                "cerrar" => 5,
            ];

            Ticket::where('id', $id)->update(array('idEstado' => $estados[$nuevoEstado]));
            $ticket = Ticket::findOrFail($id);
            return View::make("tecnico/Ticket/detalles")->with(compact('ticket'))->with('ticketModificado', 1);
        }
    }

    public function mensajeTicketT(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket) 
        {
            // Obtener el mensaje
            $mensaje = $request->input('mensaje');
            Mensaje::create(['idUsuario' => $request->user()->id, 'idTicket' => $id, 'comentario' => $mensaje, 'adjunto' => '', 'created_at' => date("Y-m-d H:i:s")]);

            return View::make("tecnico/Ticket/detalles")->with(compact('ticket'))->with('mensajeEnviado', 1);
        }
    }

    // ===== COMERCIO =====
    public function listadoComercio(Request $request)
    {
        $allTickets = Ticket::where('idComercio', '=', '2')->get();

        // Si venimos de la barra de búsqueda...
        if ($request->has('search')) {
            // Obtenemos la palabra buscada
            $keyword = $request->input('search');
            $tickets = Ticket::where('idComercio', '=', '2')->SearchByKeyword($keyword)->paginate(5); // CAMBIAR 3 por ID usuario logueado
        } else {
            $tickets = Ticket::where('idComercio', '=', '2')->paginate(5);
        }
        return View::make("comercio/Ticket/listado")->with(compact('tickets', 'allTickets'));
    }

    public function detallesComercio($id)
    {
        $ticket = Ticket::find($id);
        return View::make("comercio/Ticket/detalles")->with('ticket', $ticket);
    }

    public function mensajeTicketC(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket) 
        {
            // Obtener el mensaje
            $mensaje = $request->input('mensaje');
            Mensaje::create(['idUsuario' => $request->user()->id, 'idTicket' => $id, 'comentario' => $mensaje, 'adjunto' => '', 'created_at' => date("Y-m-d H:i:s")]); // CAMBIAR idUsuario por ID usuario logueado

            return View::make("comercio/Ticket/detalles")->with(compact('ticket'))->with('mensajeEnviado', 1);
        }
    }

    // Formulario para crear un ticket
    public function formCrearTicket(Request $request)
    {
        $transacciones = Transaccion::all();
        return View::make("comercio/Ticket/crear")->with(compact('transacciones'));
    }

    // Crea un ticket y asigna un técnico aleatorio 
    public function crearTicket(Request $request)
    {
        // Obtener datos del form
        $asunto = $request->input('asunto');
        $mensaje = $request->input('mensaje');

        // Si es null, se insertará igualmente
        $transaccionID = $request->input('transaccion');
        
        // Elegir un técnico aleatorio
        $tecnico = User::all()->where('esTecnico', '=', '1')->random(1)[0];
        
        // Crear el ticket
        $ticket = Ticket::create(['idComercio' => '2', 'idTecnico' => $tecnico->id, 'idTransaccion' => is_null($transaccionID) ? NULL : $transaccionID, 'asunto' => $asunto, 'idEstado' => '1', 'created_at' => date("Y-m-d H:i:s")]); // CAMBIAR idComercio por ID usuario logueado

        // Crear el mensaje del ticket
        Mensaje::create(['idUsuario' => '2', 'idTicket' => $ticket->id, 'comentario' => $mensaje, 'adjunto' => '', 'created_at' => date("Y-m-d H:i:s")]); // CAMBIAR idUsuario por ID usuario logueado

        // Actualizar el listado del comercio
        $allTickets = Ticket::where('idComercio', '=', '2')->get();
        $tickets = Ticket::where('idComercio', '=', '2')->paginate(5);
        return View::make("comercio/Ticket/listado")->with(compact('tickets', 'allTickets'));
    }
}
