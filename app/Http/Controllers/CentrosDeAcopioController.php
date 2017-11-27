<?php

namespace App\Http\Controllers;

use App\Medida;
use App\Articulo;
use App\Comuna;
use App\Provincia;
use App\Region;
use Illuminate\Http\Request;

use DB;
class CentrosDeAcopioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centrosDeAcopio = Medida::where('tipo','centro')->get();
        return view('centrosDeAcopio.index', ['centrosDeAcopio' => $centrosDeAcopio]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('centrosDeAcopio.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulos = DB::table('articulos')->where('id_medida', $id)->get();
        $centro = Medida::find($id);
        $comuna = Comuna::find($centro->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);

        return view('medida.centroDetails', compact('articulos', 'centro','comuna','provincia','region'));
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
