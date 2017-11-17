<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;

class WelcomeController extends Controller
{
    public function home() {
        $catastrofes = \App\Catastrofe::orderBy('fecha', 'desc')->get();
        return view('welcome', compact('catastrofes'));
    }

    public function infRedirect(){
    	return view('informacion');
    }
}
