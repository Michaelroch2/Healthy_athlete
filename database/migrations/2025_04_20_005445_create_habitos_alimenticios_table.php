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
        Schema::create('habitos_alimenticios', function (Blueprint $table) {
            $table->increments('idHA');
            $table->string('alimentacionDesayuno', 255);
            $table->string('alimentacionComida', 255);
            $table->string('alimentacionCena', 255);
            $table->string('alimentosPreferidos', 255);
            $table->string('alergiasAlimentarias', 255);
            $table->unsignedInteger('idDeportista');
            
            $table->foreign('idDeportista')->references('idDeportista')->on('deportistas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitos_alimenticios');
    }
};
