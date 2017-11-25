<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;
use Illuminate\Support\Facades\DB;
use App\Catastrofe;

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
        $medida->id_catastrofe=$request->catastrofe;
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
    public function createCentro($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararCentro',compact('catastrofe'));
    }
    public function storeBeneficio(Request $request){
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='beneficio';
        $medida->save();
        return back()->with('flash','Medida generada correctamente');
    }
    public function createBeneficio($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararBeneficio',compact('catastrofe'));
    }
    public function storeDonacion(Request $request){
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='donacion';
        $medida->save();
        return back()->with('flash','Medida generada correctamente');
    }
    public function createDonacion($id)
    {
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararDonacion',compact('catastrofe'));
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
    public function verMedidasCatastrofe($id)
    {
        $medidas = Medida::where('id_catastrofe',$id)->get();
        return view('medida/historial',compact('medidas'));
    }
}
