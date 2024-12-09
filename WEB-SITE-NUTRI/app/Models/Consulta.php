<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'user_id',
        'paciente_nome',
        'data',
        'hora',
        'status',
        'motivo_cancelamento_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motivoCancelamento()
    {
        return $this->belongsTo(MotivoCancelamento::class, 'motivo_cancelamento_id');
    }
}
