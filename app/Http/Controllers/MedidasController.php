<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;

class MedidasController extends Controller
{
	public function index()
    {
    	return view('medida/generateMedida');
    }
    public function store(){
        Medida::create([
            'id_user'=> auth()->id(),
            'nombre'=> $request->nombre,
            'fecha_inicio' => date("m-d-Y", strtotime($request->fechaInicio)),
            'fecha_termino' => date("m-d-Y", strtotime($request->fechaTermino)),
            'descripcion' => $request->descripcion,
            'direccion' => $reques->direccion,
        ]);
        return back()->with('flash','Medida generada correctamente');
    }
}
