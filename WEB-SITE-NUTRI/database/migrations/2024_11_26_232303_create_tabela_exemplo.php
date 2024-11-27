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
        // Criação da tabela 'usuarios'
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária
            $table->string('nome', 100); // Cria a coluna 'nome' (máximo de 100 caracteres)
            $table->string('email', 150)->unique(); // Cria a coluna 'email' com índice único
            $table->string('senha'); // Cria a coluna 'senha'
            $table->timestamp('criado_em')->useCurrent(); // Cria a coluna 'criado_em' com valor padrão de timestamp atual
            $table->timestamp('atualizado_em')->useCurrent()->nullable(); // Cria a coluna 'atualizado_em', permitindo valor nulo
        });

        // Criação da tabela 'produtos'
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária
            $table->string('nome', 255); // Cria a coluna 'nome' (máximo de 255 caracteres)
            $table->text('descricao')->nullable(); // Cria a coluna 'descricao' (texto longo), permitindo valor nulo
            $table->string('categoria', 100); // Cria a coluna 'categoria' (máximo de 100 caracteres)
            $table->decimal('preco', 10, 2); // Cria a coluna 'preco' (decimal com 10 dígitos, sendo 2 após a vírgula)
            $table->integer('quantidade'); // Cria a coluna 'quantidade' (tipo inteiro)
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at' automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove as tabelas se existirem
        Schema::dropIfExists('produtos'); 
        Schema::dropIfExists('usuarios');
    }
};
