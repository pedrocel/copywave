<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento com a tabela intermediária user_perfis
     */
    public function userPerfis()
    {
        return $this->hasMany(UserPerfilModel::class, 'user_id');
    }

    /**
     * Relacionamento direto com a tabela perfis
     */
    public function perfis()
    {
        return $this->belongsToMany(PerfilModel::class, 'user_perfis', 'user_id', 'perfil_id')
            ->using(UserPerfilModel::class)
            ->withPivot(['is_atual', 'status']);
    }

    /**
     * Obter o perfil atual do usuário
     */
    public function perfilAtual()
    {
        return $this->userPerfis()->where('is_atual', 1)->with('perfil')->first()?->perfil;
    }

    public function adm()
    {
        return $this->hasOne(UserPerfilModel::class, 'user_id', 'id')
            ->where('status', 1)->where('perfil_id', 1)
            ->where('is_atual', 1)->first();
    }

    public function cliente()
    {
        return $this->hasOne(UserPerfilModel::class, 'user_id', 'id')
            ->where('status', 1)->where('perfil_id', 2)
            ->where('is_atual', 1)->first();
    }

    public function pages()
    {
        return $this->hasMany(PageModel::class);
    }
}
