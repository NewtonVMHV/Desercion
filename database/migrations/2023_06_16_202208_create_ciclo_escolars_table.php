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
        Schema::create('ciclo_escolars', function (Blueprint $table) {
            $table->id();
            $table->Integer('Anio');
            $table->string('Periodo');
            $table->string('Nombre');
            $table->date('Inicio');
            $table->date('Termino');
            $table->boolean('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclo_escolars');
    }
};
