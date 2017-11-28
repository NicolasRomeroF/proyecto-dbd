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
        $medida->id_comuna = $request->comuna;
        
        $medida->save();
        
        return $this->show_centro($medida->id);;
    }
    public function createCentro($id)
    {
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararCentro',compact('catastrofe','regiones'));
    }
    public function delete_centro($id){
        Medida::destroy($id);
        return $this->verCentros();
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
        $medida->id_comuna = $request->comuna;
        $medida->save();
        return $this->show_evento($medida->id);
    }
    public function createBeneficio($id)
    {
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararBeneficio',compact('catastrofe','regiones'));
    }
    public function delete_beneficio($id){
        Medida::destroy($id);
        return $this->verBeneficios();
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
        $medida->labor=$request->labor;
        $medida->id_comuna = $request->comuna;
        $medida->save();
        
        return $this->show_voluntariado($medida->id);
    }
    public function createVoluntariado($id)
    {
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararVoluntariado',compact('catastrofe','regiones'));
    }
    public function delete_voluntariado($id){
        Medida::destroy($id);
        return $this->verVoluntariados();
    }

    public function historial()
    {
        $medidas = Medida::orderBy('fecha_inicio','desc')->get();
        //$comunas = Comuna::find($medidas->id_comuna)->get;
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


    public function update_evento(Request $request){
        $id = $request->beneficio;
        $beneficio = Medida::find($id);
        $beneficio->nombre=$request->nombre;
        $beneficio->fecha_inicio=$request->fecha_inicio;
        $beneficio->fecha_termino=$request->fecha_termino;
        $beneficio->direccion=$request->direccion;
        $beneficio->descripcion=$request->descripcion;
        $beneficio->id_comuna = $request->comuna;
        
        $beneficio->save();
        return $this->show_beneficio($beneficio->id);
    }

    

    public function update_centro(Request $request){
        $id = $request->centro;
        $centro = Medida::find($id);
        $centro->nombre=$request->nombre;
        $centro->fecha_inicio=$request->fecha_inicio;
        $centro->fecha_termino=$request->fecha_termino;
        $centro->direccion=$request->direccion;
        $centro->descripcion=$request->descripcion;
        $centro->id_comuna = $request->comuna;
        
        $centro->save();
        return $this->show_centro($centro->id);
    }

    public function show_centro($id)
    {
        $centro = Medida::find($id);
        $articulos = DB::table('articulos')->where('id_medida', $id)->get();
        $comuna = Comuna::find($centro->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);

        return view('medida/centroDetails', compact('centro','comuna','provincia','region','articulos'));

    }
     public function show_evento($id)
    {
        $beneficio = Medida::find($id);
        $comuna = Comuna::find($beneficio->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);

        return view('medida/beneficioDetails', compact('beneficio','comuna','provincia','region'));

    }

    public function edit_centro($id)
    {
        $centro = Medida::find($id);
        $regiones = Region::all();
        //return $catastrofe;
        return view('medida/editarCentro', compact('centro','regiones'));
    }

    //Voluntariados
    public function update_voluntariado(Request $request){
        $id = $request->voluntariado;
        $voluntariado = Medida::find($id);
        $voluntariado->nombre=$request->nombre;
        $voluntariado->fecha_inicio=$request->fecha_inicio;
        $voluntariado->fecha_termino=$request->fecha_termino;
        $voluntariado->direccion=$request->direccion;
        $voluntariado->descripcion=$request->descripcion;
        $voluntariado->id_comuna = $request->comuna;
        $voluntariado->labor=$request->labor;
        
        $voluntariado->save();
        return $this->show_voluntariado($id);
    }

    public function show_voluntariado($id)
    {
        $voluntariado = Medida::find($id);
        $comuna = Comuna::find($voluntariado->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);


        return view('medida/voluntariadoDetails', compact('voluntariado','comuna','provincia','region'));

    }

    public function edit_voluntariado($id)
    {
        $voluntariado = Medida::find($id);
        $regiones = Region::all();
        return view('medida/editarVoluntariado', compact('voluntariado','regiones'));
    }
}
