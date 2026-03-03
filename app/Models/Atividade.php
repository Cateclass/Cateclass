<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atividade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_entrega',
        'tipo',
        'tipo_entrega',
        'turma_id'
    ];

    // Relacionamentos
    public function turma() 
    {
        return $this->belongsTo(Turma::class);
    }

    public function respostas() 
    {
        return $this->hasMany(Resposta::class);
    }
}
