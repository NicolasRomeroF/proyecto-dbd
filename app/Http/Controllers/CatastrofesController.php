<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;
use Twitter;

class CatastrofesController extends Controller
{
	public function index()
    {
    	return view('catastrofe/catastrofeAdd');
    }

    public function store(Request $request)
    {
    	Catastrofe::create([
    		'tipo' => $request->tipo,
            'id_user'=> auth()->id(),
            'nombre'=> $request->nombre,
            'fecha' => date("m-d-Y", strtotime($request->fecha)),
            'descripcion' => $request->descripcion,
        ]);
        $tweet = '#AlertaCatastrofe' . $request->nombre . ' ' . $request->fecha;
        Twitter::postTweet(array('status' => $tweet, 'format' => 'json'));
        return back()->with('flash','Catastrofe declarada correctamente');
    }
    public function historial()
    {
        $catastrofes = Catastrofe::orderBy('fecha','desc')->get();
        return view('catastrofe/historial',['catastrofes' => $catastrofes]);
    }
    public function get(Request $request, $id){
        $catastrofe = DB::select('select * from catastroves where id = ?', $id);
        $declarador = DB::select('select name from users where id = ?', $catastrofe->id_user);
        return view('catastrofe/catastrofeDetails', $catastrofe, $declarador);
    }
}
