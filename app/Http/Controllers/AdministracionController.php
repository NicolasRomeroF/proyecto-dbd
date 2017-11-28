<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 
use app\User; 
use app\Role; 
 
class AdministracionController extends Controller 
{ 
    public function listar() 
    { 
      $bool = Auth::user()->authorizeRoles(['admin',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
      $usuarios = User::all(); 
        return view('administracion/listarUsuarios', compact('usuarios')); 
    } 
 
    public function mostrarCrearUser() { 
      $bool = Auth::user()->authorizeRoles(['admin',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
      return view('administracion/crearUsuario'); 
    } 
 
    public function mostrarDetalle($id) {
    $bool = Auth::user()->authorizeRoles(['admin',]);
        if(!$bool)
        {
            return view('bloqueado');
        } 
      $usuario = User::find($id); 
        return view('administracion/detalle', compact('usuario')); 
    } 
 
    public function banearUsuario(Request $request) { 
      $bool = Auth::user()->authorizeRoles(['admin',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
      $usuario = User::find($request->id); 
      $usuario->activo = !$usuario->activo; 
      $usuario->save(); 
      return back()->with('flash','Disponibilidad actualizada'); 
    } 
 
    public function crearUser(Request $request) { 
      $bool = Auth::user()->authorizeRoles(['admin',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
 
        $usuario = new User(); 
        $usuario->name = $request->name; 
        $usuario->apellido = $request->apellido; 
        $usuario->password = bcrypt($request->password); 
        $usuario->email = $request->email; 
        $usuario->fecha_nacimiento = $request->fecha; 
        $usuario->activo = true; 
        $usuario->save(); 
        $usuario->roles()->attach(Role::where('name', $request->roles)->first()); 
        return back()->with('flash','Usuario creado exitosamente'); 
      return view('administracion/listarUsuarios'); 
    } 
} 