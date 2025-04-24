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
        Schema::create('rutinas', function (Blueprint $table) {
            $table->increments('idRutina');
            $table->string('nombreRutina', 50);
            $table->text('ejercicios')->nullable();
            $table->string('objetivo', 100)->nullable();
            $table->integer('series')->nullable();
            $table->text('descripcionEjercicio')->nullable();
            $table->time('duracionEjercicio')->nullable();
            $table->unsignedInteger('idDeportista');
        
            // Llave foránea
            $table->foreign('idDeportista')->references('idDeportista')->on('deportistas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutinas');
    }
};
