<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->timestamp('fecha_registro')->nullable();
            $table->timestamp('fecha_ultima_modificacion')->nullable(); // Añadir esta línea
            $table->timestamps(); // Esto incluye `created_at` y `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
