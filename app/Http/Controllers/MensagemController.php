<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\models\Endereco;
use App\Http\Controllers\ProdutoController;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class MensagemController
{
    public function exibirMensagem($mensagem){
        if(!empty($mensagem)){
            echo "<div class='p-4 w-56 bg-green-500 text-black'>".$mensagem."</div>";
        }
        $mensagem = '';
    }
}
