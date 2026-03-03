<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catequizando extends Model
{
    // usa a chave da tabela user
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'data_nascimento',
        'escola',
        'paroquia_origem',
        'transferencia',
    ];

    // Relacionamento
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
