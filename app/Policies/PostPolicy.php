<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    // use HandlesAuthorization; está importando el trait HandlesAuthorization en el archivo actual. 
    //Un trait en PHP es un grupo de métodos que puedes incluir en una clase para reutilizar código.
    
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
    

    
}
