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
        Schema::create('confirmars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('aventon_id')->references('id')->on('aventons')->nulleable();
            $table->foreignId('pie_id')->references('id')->on('pies')->nulleable();
            $table->integer('confirma')->default(0);//0 solicitado, 1 aceptado, 2 rechazado 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmars');
    }
};
