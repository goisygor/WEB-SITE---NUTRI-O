<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->integer('idade');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 5, 2);
            $table->string('tipo_documento');
            $table->string('documento')->unique();
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('convenio')->nullable();
            $table->string('plano')->nullable();
            $table->string('modalidade_exame');
            $table->string('exame');
            $table->string('medico');
            // Adicionando o campo data_hora
            $table->timestamp('data_hora')->nullable(); // Definido como nullable, pois pode ser opcional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
}