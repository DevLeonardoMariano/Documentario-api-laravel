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
        Schema::create('documentarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo',30);
            $table->string('autor',30);
            // $table->string('imagem');
            $table->longText('resumo');
            $table->boolean('ativo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentarios');
    }
};
