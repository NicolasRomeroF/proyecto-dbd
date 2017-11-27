<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;
use Twitter;
use App\User;
use App\Region;

class CatastrofesController extends Controller
{
	public function index()
    {
        $regiones = Region::all();
        if (\Auth::check()) {
            return view('catastrofe/catastrofeAdd',['regiones' => $regiones]);
        }
        else {
            return view('auth/login');
        }
    }

    public function store(Request $request)
    {
        $bool = $request->user()->authorizeRoles(['admin','gobierno',]);
        if(!$bool)
        {
            return view('bloqueado');
        }

    	Catastrofe::create([
    		'tipo' => $request->tipo,
            'id_user'=> auth()->id(),
            'nombre'=> $request->nombre,
            'fecha' => date("m-d-Y", strtotime($request->fecha)),
            'id_comuna' => $request->comuna,
            'descripcion' => $request->descripcion,
        ]);
        $tweet = '#AlertaCatastrofe ' . $request->nombre . ' ' . $request->fecha;
        Twitter::postTweet(array('status' => $tweet, 'format' => 'json'));
        
        return back()->with('flash','Catastrofe declarada correctamente');
    }
    public function historial()
    {
        $catastrofes = Catastrofe::orderBy('fecha','desc')->get();
        return view('catastrofe/historial',['catastrofes' => $catastrofes]);
    }
    public function show($id)
    {
        $catastrofe = Catastrofe::find($id);
        $declarador = User::find($catastrofe->id_user)->name;

        return view('catastrofe/catastrofeDetails', compact('catastrofe', 'declarador'));

    }
    public function edit($id)
    {
        $catastrofe = Catastrofe::find($id);
        //return $catastrofe;
        return view('catastrofe/editarCatastrofe', compact('catastrofe'));
    }

    public function update(Request $request){
        $id = $request->catastrofe;
        $catastrofe = Catastrofe::find($id);
        $catastrofe->nombre=$request->nombre;
        $catastrofe->fecha=$request->fecha;
        $catastrofe->tipo=$request->tipo;
        $catastrofe->descripcion=$request->descripcion;
        
        $catastrofe->save();
        return back()->with('flash','Datos editados correctamente');
    }
}
