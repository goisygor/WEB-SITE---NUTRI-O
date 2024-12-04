<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    // Defina a tabela associada ao modelo (se necessário)
    protected $table = 'consultas';

    // Defina os campos que podem ser preenchidos no banco de dados (mass assignment)
    protected $fillable = [
        'paciente_nome',
        'data',
        'hora',
        'status',
    ];

    // Defina os campos que não podem ser preenchidos (caso necessário)
    // protected $guarded = [];

    // Defina o formato de data, caso a tabela use tipos de dados como date ou datetime
    protected $dates = [
        'data',
        'hora',
    ];

    // Caso você queira manipular a data de forma específica, use os mutators ou accessors
}
