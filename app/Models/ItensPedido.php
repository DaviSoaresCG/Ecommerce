<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    protected $table = "itens_pedidos";
    protected $fillable = ['quantidade', 'valor', 'produto_id', 'pedido_id'];
}
