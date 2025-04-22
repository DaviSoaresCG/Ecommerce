<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categoria;
use \App\Models\Produto;
use App\Http\Controllers\MensagemController;
use App\http\controllers\VendaController;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index($mensagem = '')
    {
        $data = [];
        $listaProduto = \App\Models\Produto::all();
        $data['listaProduto'] = $listaProduto;
        $objeto_mensagem = new MensagemController();
        return view('home')
            ->with('objeto_mensagem', $objeto_mensagem)
            ->with('mensagem', $mensagem)
            ->with('data', $data);
    }

    public function categoria($idcategoria = 0)
    {
        $data = [];
        $listaCategoria = Categoria::all();
        $queryProduto = Produto::query();

        if ($idcategoria != 0) {
            $queryProduto->where('categoria_id', $idcategoria);
        }

        $listaProduto = $queryProduto->get();

        $data['idcategoria'] = $idcategoria;
        $data['listaProduto'] = $listaProduto;
        $data['listaCategoria'] = $listaCategoria;
        return view('categoria')->with('data', $data);
    }

    public function adicionarCarrinho($idproduto = 0, Request $request)
    {
        //buscar o produto pelo id
        $prod = Produto::find($idproduto);
        $mensagem = '';
        if ($prod) {
            //buscar da sessao o carrinho atual
            $carrinho = session('carrinho', []);
            array_push($carrinho, $prod);
            session(['carrinho' => $carrinho]);
            $mensagem = 'Produto adicionado no carrinho';
        }
        return back()->with('sucesso', $mensagem);
    }

    public function verCarrinho(Request $request)
    {
        $carrinho = session('carrinho', []);
        return view('carrinho')->with('carrinho', $carrinho);
    }

    public function removerCarrinho(Request $request, $indice)
    {
        $carrinho = session('carrinho', []);
        if (empty($carrinho)) {
            echo "nao tem item no carrinho";
        } elseif (isset($carrinho[$indice])) {
            unset($carrinho[$indice]);
        }

        session(['carrinho' => $carrinho]);
        return redirect()->route('ver_carrinho');
    }

    public function finalizarCarrinho(Request $request)
    {

        $produtos = session('carrinho');
        $vendaController  = new VendaController;
        $result = $vendaController->finalizarVenda($produtos, Auth::user());
        if ($result == 'sucesso') {
            $request->session()->forget('carrinho');
        } else {
            return $result;
        }

        return redirect()->route('historico')->with('sucesso', 'Carrinho Finalizado!');
    }

    public function historico(Request $request)
    {
        $data = [];
        $user_id = Auth::user()->id;
        $lista_pedido = Pedido::where('usuario_id', $user_id)
            ->orderBy('data', 'desc')
            ->get();
        $data['lista_pedido'] = $lista_pedido;

        return view('compra.historico')->with('data', $data);
    }

    public function pagar(Request $request){
        $data = [];

    }
}
