<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;
use Illuminate\Support\Facades\DB;

class MedidasController extends Controller
{
	public function index()
    {
    	return view('medida/generateMedida');
    }
    public function store(Request $request){
        Medida::create([
            'id_user'=> auth()->id(),
            'nombre'=> $request->nombre,
            'direccion' => $request->direccion,
            'fecha_inicio' => date("m-d-Y", strtotime($request->fechaInicio)),
            'fecha_termino' => date("m-d-Y", strtotime($request->fechaTermino)),
            'descripcion' => $request->descripcion,
        ]);
        return back()->with('flash','Medida generada correctamente');
    }
    public function historial()
    {
        $medidas = Medida::orderBy('fecha_inicio','desc')->get();
        return view('medida/historial',['medidas' => $medidas]);
    }
}
