<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     //   $articulos = Articulo::orderBy('tipo','desc')->get();;
       // return view('articulos.index', ['articulos' => $articulos]);
    }

    public function ingresarEnCentro($id_centro)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion']);
        if(!$bool)
        {
            return view('bloqueado');
        }

        return view ('articulos.create', ['id_centro' => $id_centro]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_centro)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        return view ('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_centro)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion']);
        if(!$bool)
        {
            return view('bloqueado');
        }

        Articulo::create([
            'tipo' => $request->tipo,
            'nombre'=> $request->nombre,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'id_medida' => $id_centro
        ]);

        return back()->with('flash','Artículo añadido correctamente');


        //return ("caca $id_centro");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
