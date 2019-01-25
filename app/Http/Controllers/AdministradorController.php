<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;

class AdministradorController extends Controller
{
    public function valoraciones() {
        return view('admin/valoraciones');
    }

    public function listadoCuentas(Request $request) {
        // Si venimos de la barra de búsqueda...
        if ($request->has('search')) {
            // Obtenemos la palabra buscada
            $keyword = $request->input('search');
            $usuarios = User::SearchByKeyword($keyword)->paginate(5);
        } else {
            $usuarios = User::paginate(5);
        }
        //$usuarios = DB::table('users')->get();

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

    public function buscarCuenta() {
        return view('admin/buscarCuenta');
    }

    public function crearCuenta() {        
        return view('admin/crearCuenta');
    }
    
    public function crearCuentaUsuario(Request $request) {       
        // Obtener datos del form
        $nick = $request->input('nick');
        $password = Hash::make($request->input('password'));
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $key = $request->input('key');
        $endpoint = $request->input('endpoint');
        $tipo = $request->input('tipo');
        
        // Actualizar el usuario
        if($tipo == "administrador") {
            DB::table('users')->insert(['nick' => $nick, 'password' => $password, 'nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 
            'esComercio' => false, 'esAdministrador' => true, 'esTecnico' => false, 'key' => $key, 'endpoint' => $endpoint]);
        } else if($tipo == "tecnico") {
            DB::table('users')->insert(['nick' => $nick, 'password' => $password, 'nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email,
            'esComercio' => false, 'esAdministrador' => false, 'esTecnico' => true, 'key' => $key, 'endpoint' => $endpoint]);
        } else {
            DB::table('users')->insert(['nick' => $nick, 'password' => $password, 'nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 
            'esComercio' => true, 'esAdministrador' => false, 'esTecnico' => false, 'key' => $key, 'endpoint' => $endpoint]);
        }
        
        return view('admin/crearCuenta')->with('usuarioCreado', 1);
    }
}
