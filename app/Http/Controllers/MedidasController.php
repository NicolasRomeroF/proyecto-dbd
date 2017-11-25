<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;
use Illuminate\Support\Facades\DB;
use App\Centro_acopio;

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
    public function storeCentro(Request $request){
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='centro';
        $medida->save();
        return back()->with('flash','Medida generada correctamente');
    }
    public function createCentro()
    {
        return view('medida/declararCentro');
    }

    public function historial()
    {
        $medidas = Medida::orderBy('fecha_inicio','desc')->get();
        return view('medida/historial',['medidas' => $medidas]);
    }
    public function verCentros()
    {
        $centros = Medida::where('tipo','centro')->get();
        return view('medida/verCentros',['centros'=>$centros]);
    }
    public function verMedidas($id)
    {
        $medidas = Medida::find($id);
        return view('medida/historial',['medidas'=>$medidas]);
    }
}
