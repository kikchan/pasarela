<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function borrarUsuario($id) {
        DB::table('users')->where('id', $id)->delete();
        //User::findOrFail($id)->delete();

        return redirect('/administrador/listadoCuentas');
    }
}
