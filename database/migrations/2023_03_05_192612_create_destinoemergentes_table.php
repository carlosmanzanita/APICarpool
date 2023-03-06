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
        Schema::create('destinoemergentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('confirmar_id')->references('id')->on('confirmars');
            $table->foreignId('alumno_id')->references('id')->on('alumnos');
            $table->foreignId('aventon_id')->references('id')->on('aventons');
            $table->foreignId('destino_id')->references('id')->on('destinos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinoemergentes');
    }
};
