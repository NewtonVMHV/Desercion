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
        Schema::create('registro__alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('Matricula',9);
            $table->string('Nombre',50);
            $table->time('Hora');
            $table->date('Fecha');
            $table->string('Actividad',20);
            $table->string('Carrera',100);
            $table->string('Materia',45);
            $table->string('Laboratorio',45);
            $table->string('Observaciones',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro__alumnos');
    }
};
