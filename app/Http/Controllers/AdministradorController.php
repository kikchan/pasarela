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
        return view('admin/listadoCuentas');
    }
}
