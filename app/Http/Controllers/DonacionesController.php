<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fondo;

class DonacionesController extends Controller
{
    public function storeDonacion(Request $request){
        $medida = new Donacion();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->monto = $request->monto;
        $medida->cuenta = $request->cuenta;
        $medida->banco = $request->banco;
        $medida->save();
        return $request->id_fondo;
        $fondo = Fondo::find($id_fondo);
        $fondo->montoActual=$fondo->montoActual+$request->monto;
        if($fondo->montoActual==$fondo->monto){
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
