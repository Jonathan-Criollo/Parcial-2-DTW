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
        Schema::create('AgendaContactos', function (Blueprint $table) {
            $table->id(); // ID automático
            $table->string('nombre', 50); // Campo para el nombre, máximo 50 caracteres
            $table->string('apellidos', 50); // Campo para los apellidos, máximo 50 caracteres
            $table->string('telefono', 8); // Campo para el teléfono, exactamente 8 caracteres
            $table->string('email', 50)->unique(); // Campo para el email, máximo 50 caracteres y único
            $table->string('notas', 150)->nullable(); // Campo para notas, máximo 150 caracteres y puede ser nulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AgendaContactos');
    }
};
