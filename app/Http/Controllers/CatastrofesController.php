<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use Twitter;
use App\User;
use App\Region;
use App\Comuna;
use App\Provincia;

class CatastrofesController extends Controller
{
	public function index()
    {
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $regiones = Region::all();
        if (\Auth::check()) {
            return view('catastrofe/añadirCatastrofe',['regiones' => $regiones]);
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
        
        $catastrofe= new Catastrofe();
        $catastrofe->tipo=$request->tipo;
        $catastrofe->id_user=auth()->id();
        $catastrofe->nombre=$request->nombre;
        $catastrofe->fecha=date("m-d-Y", strtotime($request->fecha));
        $catastrofe->lugar=$request->lugar;
        $catastrofe->latitud=$request->latitud;
        $catastrofe->longitud=$request->longitud;
        $catastrofe->descripcion=$request->descripcion;
        $catastrofe->save();
    	
        $tweet = '#AlertaCatastrofe ' . $request->nombre . ' en ' . $request->lugar. ' ' . $request->fecha;
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
        

        return view('catastrofe/catastrofeDetails', compact('catastrofe', 'declarador','comuna','provincia','region'));

    }
    public function edit($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $catastrofe = Catastrofe::find($id);
        $regiones = Region::all();
        //return $catastrofe;
        return view('catastrofe/editarCatastrofe', compact('catastrofe','regiones'));
    }

    public function update(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $id = $request->catastrofe;
        $catastrofe = Catastrofe::find($id);
        $catastrofe->nombre=$request->nombre;
        $catastrofe->fecha=$request->fecha;
        $catastrofe->tipo=$request->tipo;
        $catastrofe->descripcion=$request->descripcion;
        $catastrofe->lugar = $request->lugar;
        $catastrofe->longitud = $request->longitud;
        $catastrofe->latitud = $request->latitud;

        
        $catastrofe->save();
        return back()->with('flash','Datos editados correctamente');
    }
    public function delete($id){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        Catastrofe::destroy($id);
        return $this->historial();
    }
}
