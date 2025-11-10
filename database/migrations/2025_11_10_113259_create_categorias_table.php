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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Clave primaria auto-incremental
            $table->string('nombre', 100)->unique()->nullable(false); // Nombre único y no nulo
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->string('slug', 150)->unique(); // Slug único para URLs amigables
            $table->boolean('estado')->default(true); // Estado activo/inactivo (true = activo)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
