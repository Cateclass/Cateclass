<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aviso extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_publicacao',
        'turma_id',
        'autor_id'
    ];

    // Relacionamentos
    public function turma() 
    {
        return $this->belongsTo(Turma::class);
    }

    public function autor() 
    {
        return $this->belongsTo(User::class, 'autor_id');
    }
}
