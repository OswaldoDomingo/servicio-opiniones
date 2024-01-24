 <!-- Si se va a Post hay un método que se llama user y con eso se trae el nombre del usuario -->
 <a href="#" class="text-lg font-semibold">{{ $post->user->name }}</a>
 <p class="mt-1 text-xs">
     <em>
         {{ $post->created_at->format('d/m/Y') }}
     </em>
     {{ $post->body }}
 </p>
 @can('destroy-post', $post)
 <!-- // En la acccion ponemos la ruta de eliminar y le pasamos el id del post  -->
 <form action="{{ route('posts.destroy', $post) }}" method="POST">
     <!-- // Se le pasa el token de seguridad -->
     @csrf
     <!-- // Se le pasa el método DELETE -->
     @method('DELETE')

     <button class="text-indigo-600 text-xs">{{ __('delete') }}</button>
 </form>
 @endcan
 <!-- // En la acccion ponemos la ruta de eliminar y le pasamos el id del post  -->
