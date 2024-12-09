<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotivoCancelamentoIdColumnToConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultas', function (Blueprint $table) {
            // Adicionando a coluna motivo_cancelamento_id
            $table->unsignedBigInteger('motivo_cancelamento_id')->nullable()->after('status');
            
            // Definindo a chave estrangeira para a tabela 'motivos_cancelamento'
            $table->foreign('motivo_cancelamento_id')->references('id')->on('motivos_cancelamento')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            // Removendo a chave estrangeira e a coluna motivo_cancelamento_id
            $table->dropForeign(['motivo_cancelamento_id']);
            $table->dropColumn('motivo_cancelamento_id');
        });
    }
}
