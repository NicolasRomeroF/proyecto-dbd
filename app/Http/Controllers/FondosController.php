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
        $medida->montoActual=0;
        $medida->cuenta = $request->cuenta;
        $medida->banco = $request->banco;
        $medida->activo= True;
        $medida->save();
        
        return $this->show_fondo($medida->id);
    }
    public function createFondo($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararFondo',compact('catastrofe'));
    }
    public function delete_fondo($id){
        Fondo::destroy($id);
        return $this->verFondos();
    }
    public function verFondos()
    {
        $fondos = Fondo::all();
        return view('medida/verFondos',['fondos'=>$fondos]);
    }
     public function update_fondo(Request $request){
        $id = $request->fondo;
        $fondo = Fondo::find($id);
        $fondo->nombre=$request->nombre;
        $fondo->fecha_inicio=$request->fecha_inicio;
        $fondo->fecha_termino=$request->fecha_termino;
        $fondo->cuenta=$request->cuenta;
        $fondo->banco=$request->banco;
        $fondo->descripcion = $request->descripcion;
        $fondo->monto = $request->monto;

        if($fondo->montoActual<$fondo->monto){
            $fondo->activo=True;
        }
        else{
            $fondo->activo=False;
        }
        
        $fondo->save();
        return $this->show_fondo($fondo->id);
    }
    public function edit_fondo($id)
    {
        $fondo = Fondo::find($id);
        //return $catastrofe;
        return view('medida/editarFondo', compact('fondo'));
    }
    public function show_fondo($id)
    {
        $fondo = Fondo::find($id)->where('valido',1);

        return view('medida/fondoDetails', compact('fondo'));

    }

}
