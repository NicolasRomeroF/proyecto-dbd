<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{
    public function listar()
    {

    	return view('administracion/listarUsuarios');
    }
}
