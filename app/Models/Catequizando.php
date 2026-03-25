<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
