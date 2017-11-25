<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Fondo;

class FondosController extends Controller
{
    public function storeFondo(Request $request){
        $medida = new Fondo();
       	$medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->monto = $request->monto;
        $medida->cuenta = $request->cuenta;
        $medida->banco = $request->banco;
        $medida->save();
        return back()->with('flash','Donacion generada correctamente');
    }
    public function createFondo($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararFondo',compact('catastrofe'));
    }
}
