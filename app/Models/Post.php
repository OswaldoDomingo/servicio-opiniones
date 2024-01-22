<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Se le añade la restricción se le va a permitir de manera masiva y desde un formulario al campo body
    protected $fillable = ['body'];
    //Si no se hace así, cuando se cree un registro nuevo creará un error de asignación masiva
    // la propiedad $fillable en un modelo es usada para especificar qué campos pueden ser asignados de manera masiva. Esto es una medida de seguridad que previene que los usuarios cambien campos sensibles de la base de datos que no deberían ser modificados directamente.

    public function user() {
        // Un post pertenece a un usuario
        return $this->belongsTo(User::class);
    }
}
