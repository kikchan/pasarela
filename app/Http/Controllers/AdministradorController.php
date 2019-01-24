<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdministradorController extends Controller
{
    public function vista(){
        return view('admin/dashboard');       
    }

    public function valoraciones() {
        return view('admin/valoraciones');
    }

    public function listadoCuentas() {
        $usuarios = DB::table('users')->get();

        return view('admin/listadoCuentas', ['usuarios'=>$usuarios]);
    }

    public function borrarCuenta($id) {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/administrador/listadoCuentas');
    }

    // Muestra el formulario para editar usuarios
    public function editarCuentaForm($id) {
        $usuario = DB::table('users')->where('id', $id)->first();

        return view('admin/editarCuenta', ['usuario'=>$usuario]);
    }

    // Edita al usuario y vuelve al formulario de editar usuarios
    public function editarCuentaUsuario(Request $request, $id) 
    {
        // Obtener datos del form
        $nick = $request->input('nick');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $key = $request->input('key');
        $endpoint = $request->input('endpoint');
        $tipo = $request->input('tipo');
        
        // Actualizar el usuario
        if($tipo == "administrador") {
            DB::table('users')->where('id', $id)->update(['nick' => $nick, 'nombre' => $nombre, 'apellidos' => $apellidos, 
            'email' => $email, 'esComercio' => false, 'esAdministrador' => true, 'esTecnico' => false]);
        } else if($tipo == "tecnico") {
            DB::table('users')->where('id', $id)->update(['nick' => $nick, 'nombre' => $nombre, 'apellidos' => $apellidos, 
            'email' => $email, 'esComercio' => false, 'esAdministrador' => false, 'esTecnico' => true]);
        } else {
            DB::table('users')->where('id', $id)->update(['nick' => $nick, 'nombre' => $nombre, 'apellidos' => $apellidos, 
            'email' => $email, 'esComercio' => true, 'esAdministrador' => false, 'esTecnico' => false]);
        }
        
        // Actualizar la página con los datos nuevos
        $usuario = DB::table('users')->where('id', $id)->first();
        return view('admin/editarCuenta', ['usuario'=>$usuario])->with('usuarioEditado', 1);
    }
}
