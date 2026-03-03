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
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_turma', 100);
            $table->string('tipo_turma', 10);
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->string('codigo_turma', 10)->unique()->nullable();
            $table->foreignId('etapa_id')->constrained('etapas');
            $table->foreignId('catequista_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
