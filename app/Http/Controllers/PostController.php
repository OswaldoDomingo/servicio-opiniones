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
        // Valida los datos del formulario si no funciona dará error
        $request->validate(['body' => 'required']);
        
        // Envía todos los datos del formulario
        // return $request->all();
        //Vamos a hacer que cree una publicación a partir de un usuario dado
        $request->user()->posts()->create($request->only('body'));
        // Redirigimos a la página principal
        return back()->with('status', 'Publicación guardada!');
    }
    public function destroy()
    {
        // eliminar
    }
    
}
