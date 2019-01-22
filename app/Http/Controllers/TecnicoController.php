<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TecnicoController extends Controller
{
    public function vista(){
        return view('tecnico/generalTecnico');       
    }

}
