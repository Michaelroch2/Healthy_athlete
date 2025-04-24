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
        Schema::create('estado_fisico', function (Blueprint $table) {
            $table->increments('idEstadoFisico');
            $table->double('peso')->nullable();
            $table->double('altura')->nullable();
            $table->double('imc')->nullable();
            $table->double('porcentajeGrasaCorporal')->nullable();
            $table->string('actividadFisica', 100)->nullable();
            $table->date('fechaEstadoFisico')->nullable();
            $table->unsignedInteger('idDeportista');
        
            $table->timestamps();
        
            // Llave foránea
            $table->foreign('idDeportista')->references('idDeportista')->on('deportistas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_fisico');
    }
};
