<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        // Envía todos los datos del formulario
        return $request->all();
    }
    public function destroy()
    {
        // eliminar
    }
    
}
