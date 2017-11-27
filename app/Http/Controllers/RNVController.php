<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RNV;

class RNVController extends Controller
{
    public function listado()
    {
        $voluntarios = RNV::get();
        return view('RNV/listado',['voluntarios' => $voluntarios]);
    }

    public function disponibles()
    {
        $voluntarios = RNV::where('disponible', true)->get();
        return view('RNV/voluntariosDisponibles',['voluntarios' => $voluntarios]);
    }



    public function cambiarEstadoVoluntario(Request $request) {
    	$voluntario = RNV::find($request->id);
    	$voluntario->disponible = !$voluntario->disponible;
    	$voluntario->save();
    	return back()->with('flash','Disponibilidad actualizada');
    }

    public function mostrarDetalle($id)
    {
        $voluntario = RNV::find($id);
        return view('RNV/detalle', compact('voluntario'));

    }
}
