<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;
use Twitter;
use App\User;

class CatastrofesController extends Controller
{
	public function index()
    {
        if (\Auth::check()) {
            return view('catastrofe/catastrofeAdd');
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
}
