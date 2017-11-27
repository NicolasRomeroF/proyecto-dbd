<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;
use Illuminate\Support\Facades\DB;
use App\Catastrofe;
use App\Fondo;
use App\Region;
use App\Provincia;
use App\Comuna;

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
            'id_region' => $request->region,
            'id_provincia' => $request->provincia,
            'id_comuna' => $request->comuna,
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
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararCentro',compact('catastrofe','regiones'));
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
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararBeneficio',compact('catastrofe','regiones'));
    }
    public function storeVoluntariado(Request $request){
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='voluntariado';
        $medida->save();
        return back()->with('flash','Medida generada correctamente');
    }
    public function createVoluntariado($id)
    {
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararVoluntariado',compact('catastrofe','regiones'));
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
    public function verBeneficios()
    {
        $beneficios = Medida::where('tipo','beneficio')->get();
        return view('medida/verBeneficios',compact('beneficios'));
    }
    public function verVoluntariados()
    {
        $voluntariados = Medida::where('tipo','voluntariado')->get();
        return view('medida/verVoluntariados',['voluntariados'=>$voluntariados]);
    }

    public function verMedidasCatastrofe($id)
    {
        $medidas = Medida::where('id_catastrofe',$id)->get();
        $fondos = Fondo::where('id_catastrofe',$id)->get();
        return view('medida/historial',compact('medidas','fondos'));
    }

    public function show_evento($id)
    {
        $beneficio = Medida::find($id);

        return view('medida/beneficioDetails', compact('beneficio'));

    }

    public function edit_evento($id)
    {
        $beneficio = Medida::find($id);
        //return $catastrofe;
        return view('medida/editarBeneficio', compact('beneficio'));
    }

    public function update_evento(Request $request){
        $id = $request->beneficio;
        $beneficio = Medida::find($id);
        $beneficio->nombre=$request->nombre;
        $beneficio->fecha_inicio=$request->fecha_inicio;
        $beneficio->fecha_termino=$request->fecha_termino;
        $beneficio->direccion=$request->direccion;
        $beneficio->descripcion=$request->descripcion;
        
        $beneficio->save();
        return back()->with('flash','Datos editados correctamente');
    }
}
