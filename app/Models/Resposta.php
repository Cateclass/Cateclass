<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resposta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'catequizando_id',
        'atividade_id',
        'texto',
        'data_envio',
        'comentario_catequista'
    ];

    // Relacionamentos
    public function autor() 
    {
        return $this->belongsTo(User::class, 'catequizando_id');
    }

    public function atividade() 
    {
        return $this->belongsTo(Atividade::class);
    }
}
