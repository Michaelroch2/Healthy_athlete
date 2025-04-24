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
        Schema::create('dietas', function (Blueprint $table) {
            $table->increments('idDieta');
            $table->string('nombreDieta', 25);
            $table->text('alimentos')->nullable();
            $table->integer('totalCalorias')->nullable();
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
        Schema::dropIfExists('dietas');
    }
};
