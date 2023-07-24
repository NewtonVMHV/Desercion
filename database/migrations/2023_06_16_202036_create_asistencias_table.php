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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('CicloEscolar',50);
            $table->string('Carrera',50);
            $table->string('Semestre');
            $table->string('Matricula',9);
            $table->string('NombreCompleto',50);
            $table->Integer('Semana');
            $table->string('Materia');
            $table->string('Docente');
            $table->Integer('Inasistencia');
            $table->string('Motivo');
            $table->string('Estatus')->default('Pendiente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
