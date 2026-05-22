<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Message extends Model
{
    // uso o mongo
    protected $connection = 'mongodb';

    // nome da colecao
    protected $collection = 'messages';

    protected $fillable = [
        'turma_id', // id da turma
        'sender_id', // id da pessoa que enviou
        'receiver_id', // id do que recebeu
        'body', // a msg
        'read_at' // se foi lida ou não
    ];
}
