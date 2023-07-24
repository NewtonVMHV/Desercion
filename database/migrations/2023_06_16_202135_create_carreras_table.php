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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('Interna',5);
            $table->string('Clave_Oficial',15);
            $table->string('Reticula',5);
            $table->string('Nivel_Escolar',15);
            $table->string('Modalidad',45);
            $table->string('Nombre',45);
            $table->string('Reducido',20);
            $table->string('Siglas',5);
            $table->smallInteger('Creditos');
            $table->tinyInteger('Maxima');
            $table->tinyInteger('Minima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
