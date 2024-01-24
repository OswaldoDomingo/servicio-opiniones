<?php
namespace App\Providers;

use App\Models\Post;
use App\Models\User;

//La fachada Gate proporciona una interfaz sencilla y fácil de usar para autorizar acciones.
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('destroy-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        //Gate::define('destroy-post', function (User $user, Post $post) { return $user->id === $post->user_id; }); define una regla de autorización llamada destroy-post. Esta regla toma una instancia del modelo User y una instancia del modelo Post como argumentos.
        // La función de cierre function (User $user, Post $post) { return $user->id === $post->user_id; } determina si el usuario tiene permiso para "destruir" (o eliminar) el post. En este caso, la regla es que el usuario solo puede eliminar el post si el ID del usuario coincide con el user_id del post. Esto significa que solo el usuario que creó el post puede eliminarlo.
        //Después de definir esta regla, se puede usar Gate::allows('destroy-post', $post) en cualquier lugar de la aplicación para determinar si el usuario autenticado tiene permiso para eliminar un post específico.
    }
}
