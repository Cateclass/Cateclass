<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome_turma',
        'tipo_turma',
        'data_inicio',
        'data_termino',
        'codigo_turma',
        'etapa_id',
        'catequista_id'
    ];

    // Relacionamentos
    public function etapa() 
    {
        return $this->belongsTo(Etapa::class);
    }

    public function catequista() 
    {
        return $this->belongsTo(User::class, 'catequista_id');
    }

    public function avisos() 
    {
        return $this->hasMany(Aviso::class);
    }

    public function atividades() 
    {
        return $this->hasMany(Atividade::class);
    }

    public function alunos() 
    {
        return $this->belongsToMany(User::class, 'turma_user')->withPivot('status');
    }
}
