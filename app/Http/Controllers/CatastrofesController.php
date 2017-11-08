<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatastrofesController extends Controller
{
	public function index()
    {
    	return view('catastrofe/catastrofeAdd');
    }

    public function store(Request $request)
    {
    	
    }
}
