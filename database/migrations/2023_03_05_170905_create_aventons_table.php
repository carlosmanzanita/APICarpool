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
        Schema::create('aventons', function (Blueprint $table) {
            $table->id();
            $table->string('asientos');
            //$table->foreignId('confirmar_id')->references('id')->on('confirmars');
            $table->foreignId('alumno_id')->references('id')->on('alumnos');
            $table->foreignId('encuentro_id')->references('id')->on('encuentros');
            $table->foreignId('destino_id')->references('id')->on('destinos');
            $table->foreignId('auto_id')->references('id')->on('autos');
            $table->foreignId('modalidad_id')->references('id')->on('modalidads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aventons');
    }
};
