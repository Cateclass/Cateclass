<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    // criação do código único da turma
    protected static function booted(): void
    {
        static::creating(function ($turma) {
            if(empty($turma->codigo_turma)){
                $turma->codigo_turma = strtoupper(substr(uniqid(), 7, 6));
            }
        });
    }


    // Relacionamentos
    public function etapa() : BelongsTo
    {
        return $this->belongsTo(Etapa::class);
    }

    public function catequista() : BelongsTo
    {
        return $this->belongsTo(User::class, 'catequista_id');
    }

    public function avisos() : HasMany
    {
        return $this->hasMany(Aviso::class);
    }

    public function atividades() : HasMany
    {
        return $this->hasMany(Atividade::class);
    }

    public function alunos() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'turma_user')->withPivot('status');
    }
}
