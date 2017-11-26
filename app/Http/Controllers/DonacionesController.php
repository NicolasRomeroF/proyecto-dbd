<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fondo;
use App\Donacion;

class DonacionesController extends Controller
{
    public function storeDonacion(Request $request){
        $medida = new Donacion();
        $medida->id_user = auth()->id();
        $medida->id_fondos=$request->id_fondo;
        $medida->monto = $request->monto;
        $medida->cuenta = $request->cuenta;
        $medida->banco = $request->banco;
        $medida->save();
        $fondo = Fondo::find($request->id_fondo);
        $fondo->montoActual=$fondo->montoActual+$request->monto;
        if($fondo->montoActual>$fondo->monto){
            $fondo->activo=False;
        }
        $fondo->save();
        return back()->with('flash','Donacion generada correctamente');
    }
    public function createDonacion($id)
    {
        $fondo=Fondo::find($id);
        return view('medida/declararDonacion',compact('fondo'));
    }
}
