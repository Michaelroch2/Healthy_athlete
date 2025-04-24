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
        Schema::create('restricciones_dieteticas', function (Blueprint $table) {
            $table->increments('idRD');
            $table->text('descripcionRD')->nullable();
            $table->string('enfermedades', 255)->nullable();
            $table->string('tipoRestriccion', 100)->nullable();
            $table->text('alimentosProhibidos')->nullable();
            $table->text('alimentosPermitidos')->nullable();
            $table->text('motivoRestriccionDietetica')->nullable();
            
            // Clave foránea
            $table->unsignedInteger('idDeportista');
            $table->foreign('idDeportista')
                  ->references('idDeportista')->on('deportistas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restricciones_dieteticas');
    }
};
