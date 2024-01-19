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
        // Criação das colunas da tabela
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();               // Id UNIQUE
            $table->string('name'); 
            $table->decimal('price');
            $table->timestamps();       // Criado, editado em
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
