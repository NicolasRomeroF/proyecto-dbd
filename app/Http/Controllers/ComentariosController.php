<?php

namespace App\Http\Controllers;
use App\Comentario;
use Illuminate\Http\Request;
use DB;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }


    public function mostrar($id)
    {
        $id_user =auth()->id();
        $user = DB::table('users')->where('id', $id_user)->get();
        $comentarios = DB::table('comentarios')->where('id_medida', $id)->get();
        return view('comentarios.index', ['comentarios' => $comentarios, 'id_medida' => $id , 'users' => $user ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function comentar($id_centro)
    {

        return view ('comentarios.comentar', ['id_medida' => $id_centro]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_medida)
    {

    }

    public function guardar(Request $request, $id_medida)
    {

        Comentario::create([
        'comentario' => $request->tipo,
        'id_user'  => auth()->id(),
        'id_medida' => $id_medida
]);

        return redirect(route('mostrarComentario', $id_medida))->with('flash','Comentario añadido correctamente');

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
