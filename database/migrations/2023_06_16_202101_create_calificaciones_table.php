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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('CicloEscolar');
            $table->string('Unidades');
            $table->string('Carrera');
            $table->string('Semestre');
            $table->string('Matricula');
            $table->string('Nombre');
            $table->string('Materia');
            $table->string('Docente');
            $table->string('Calificacion');
            $table->string('Estatus')->default('Pendiente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
