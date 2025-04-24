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
        Schema::create('clase', function (Blueprint $table) {
            $table->increments('idClase');
            $table->string('nombreClase', 100);
            $table->string('tipoClase', 100);
            $table->string('lugarClase', 25);
            $table->string('direccionClase', 60);
            $table->time('horarioClase');
            $table->unsignedInteger('idClub');
            $table->unsignedInteger('idEntrenador');
            
            $table->foreign('idClub')->references('idClub')->on('clubes');
            $table->foreign('idEntrenador')->references('idEntrenador')->on('entrenadores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase');
    }
};
