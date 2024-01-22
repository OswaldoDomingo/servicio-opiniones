<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Añadido para la relación
            //conexión los posts con los usuarios 
            $table->unsignedBigInteger('user_id');
            // Comunicamos que user_id se relaciona con el id de la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Campo para guardar las publicaciones
            $table->text('body');
            // Fin de añadido para la relación

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
