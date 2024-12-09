<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoCancelamento extends Model
{
    use HasFactory;

    protected $table = 'motivos_cancelamento';

    protected $fillable = ['descricao'];

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'motivo_cancelamento_id');
    }
}
