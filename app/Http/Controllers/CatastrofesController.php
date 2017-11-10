<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use Illuminate\Support\Facades\DB;

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
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
        ]);
        return back()->with('flash','Catastrofe declarada correctamente');
    }
    public function historial()
    {
        $catastrofes =  DB::table('catastroves')
                ->orderBy('fecha', 'desc')
                ->get();
        return view('catastrofe/historial',['catastrofes' => $catastrofes]);
    }
}
