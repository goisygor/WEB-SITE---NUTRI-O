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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária
            $table->string('nome', 100); // Cria a coluna 'nome' (máximo de 100 caracteres)
            $table->string('email', 150)->unique(); // Cria a coluna 'email' com índice único
            $table->string('senha'); // Cria a coluna 'senha'
            $table->timestamp('criado_em')->useCurrent(); // Cria a coluna 'criado_em' com valor padrão de timestamp atual
            $table->timestamp('atualizado_em')->useCurrent()->nullable(); // Cria a coluna 'atualizado_em', permitindo valor nulo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios'); // Remove a tabela 'usuarios' se ela existir
    }
};
