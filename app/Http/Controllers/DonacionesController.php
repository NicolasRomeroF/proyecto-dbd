<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return back()->with('flash','Donacion generada correctamente');
    }
    public function createDonacion($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararDonacion',compact('catastrofe'));
    }
}
