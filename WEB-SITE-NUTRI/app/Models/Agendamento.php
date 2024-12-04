<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    // Define o nome da tabela se ela for diferente do nome do modelo (opcional)
    protected $table = 'agendamentos'; // Caso a tabela tenha um nome diferente

    // Define os campos que podem ser preenchidos
    protected $fillable = [
        'nome',
        'sobrenome',
        'idade',
        'peso',
        'altura',
        'tipo_documento',
        'documento',
        'endereco',
        'bairro',
        'cidade',
        'convenio',
        'plano',
        'modalidade_exame',
        'exame',
        'medico',
    ];

    // Caso a tabela não tenha timestamps, desative a propriedade abaixo (não recomendado para tabelas que registram dados temporais)
    public $timestamps = true; // Deixe como true se você estiver utilizando os campos created_at e updated_at

    // Se não estiver usando os timestamps, defina como false
    // public $timestamps = false; 
}
