<?php

namespace App\Http\Controllers;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Usuario;
use DateTime;
use Illuminate\Routing\Controller;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class VendaController extends Controller
{
    public function finalizarVenda()
    {
        $produtos = session('carrinho');
        $user = Auth::user();
        try {
            db::transaction(function () use ($produtos, $user) {
                $date = new DateTime();
                $pedido = new Pedido();

                $pedido->data = $date->format('Y-m-d H:i:s');
                $pedido->status = "PEN";
                $pedido->usuario_id = $user->id;

                foreach ($produtos as $produto) {
                    $itens = new ItensPedido();
                    $pedido->total = $pedido->total + $produto->valor;
                    $pedido->save();
                    $itens->quantidade = 1;
                    $itens->valor = $produto->valor;
                    $itens->produto_id = $produto->id;
                    $itens->pedido_id = $pedido->id;
                    $itens->usuario_id = $user->id;
                    $itens->save();
                }
            });
            return "sucesso";
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return $e->getMessage();
        }
    }
}
