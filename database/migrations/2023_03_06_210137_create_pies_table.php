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
        Schema::create('pies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->references('id')->on('alumnos');
            $table->foreignId('encuentro_id')->references('id')->on('encuentros');
            $table->foreignId('destino_id')->references('id')->on('destinos');
            $table->foreignId('confirmar_id')->references('id')->on('confirmars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pies');
    }
};
