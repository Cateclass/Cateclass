<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'endereco',
        'tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relacionamentos
    
    //1:1
    public function catequizando()
    {
        return $this->hasOne(Catequizando::class);
    }

    //1:N
    public function reunioes()
    {
        return $this->hasMany(Reuniao::class, 'organizador_id');
    }
    public function avisos()
    {
        return $this->hasMany(Aviso::class, 'autor_id');
    }
    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'catequizando_id');
    }
    public function turmasGerenciadas()
    {
        return $this->hasMany(Turma::class, 'catequista_id');
    }

    //N:N
    public function turmasCursadas()
    {
        return $this->belongsToMany(Turma::class, 'turma_user')->withPivot('status');
    }
}
