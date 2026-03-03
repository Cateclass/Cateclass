<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome_etapa',
        'descricao',
    ];

    // Relacionamento
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
