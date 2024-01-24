<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()

    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario si no funciona dará error
        $request->validate(['body' => 'required']);
        
        //Colocamos un helper para que nos muestre los datos del formulario, se comenta para que no se muestre en la vista 
        //dd($request->only('body'));
        //También se puede crear el array de la siguiete forma
        //dd($request->(['body' => $request->body]));

        // Envía todos los datos del formulario
        // return $request->all();
        //Vamos a hacer que cree una publicación a partir de un usuario dado
        //Este usuario ha creado un post y la información se la vamos a pasar en este array 
        $request->user()->posts()->create($request->only('body'));
        // Redirigimos a la página principal
        return back()->with('status', 'Publicación guardada!');
    }
    // public function destroy(Post $post)
    // añadimos el request para que solo el usuario que ha creado el post pueda eliminarlo
    public function destroy(Request $request, Post $post)
    {   
        //Veamos el id del yusuario que sale en la consola 
        //dd($request->user()->id); // 1 app\Http\Controllers\PostController.php:39'
        //vamos a crear la condición para que solo el usuario que ha creado el post pueda eliminarlo
        //Si el id del usuario que ha creado el post es igual al id del usuario que está autenticado entonces se puede eliminar el post.
        if($request->user()->id !== $post->user_id){
            //Si no es así entonces se aborta la operación y se muestra un error 403 el servidor detecta que el usuario no tiene permisos para realizar la acción
            abort(403);
            //Si no es así entonces se redirige a la página principal
            //return redirect()->route('home');
        }
        //Se le pasa el modelo Post y se le pasa el id del post que se quiere eliminar
        $post->delete();
        // Redirigimos a la página principal con un mensaje de confirmación 
        return back()->with('status', 'Publicación eliminada!');
    }
    
}
