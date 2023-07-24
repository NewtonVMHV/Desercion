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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('ClaveMat',8);
            $table->string('NivelEscolar',20);
            $table->string('Nombre',30);
            $table->string('TipoMateria',40);
            $table->string('NombreAbreviado',25);
            $table->Integer('Creditos');
            $table->string('carrera');
            $table->string('Semestre');
            $table->Integer('Unidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
