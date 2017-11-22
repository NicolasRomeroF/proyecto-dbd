<?php

namespace App\Http\Controllers;

use App\Centro_acopio;
use Illuminate\Http\Request;

class CentrosDeAcopioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centrosDeAcopio = Centro_acopio::orderBy('nombre','desc')->get();;
        return view('centrosDeAcopio.index', ['centrosDeAcopio' => $centrosDeAcopio]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //return view ('centrosDeAcopio.create');   //
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


        Centro_acopio::create([
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'situacion' => $request->situacion
        ]);

        return back()->with('flash','Información de centro de acopio ingresada correctamente');        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
