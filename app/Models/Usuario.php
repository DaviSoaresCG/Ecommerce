<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['email', 'nome', 'cpf', 'senha'];

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
