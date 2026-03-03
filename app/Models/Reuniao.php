<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';

    protected $fillable = [
        'tema',
        'descricao',
        'data_hora',
        'local',
        'publico_alvo',
        'organizador_id'
    ];

    // Relacionamento
    public function organizador() 
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }
}
