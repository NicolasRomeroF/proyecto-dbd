<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = \App\User::all();
        return view('home', compact('usuarios'));
    }

    public function perfil_user()
    {
        $id = Auth::id();
        $usuario = \App\User::find($id);
        return view('perfil', compact('usuario'));
    }

    public function update_usuario(Request $request){
        $id = Auth::id();
        $usuario = \App\User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('home');
    }
}
