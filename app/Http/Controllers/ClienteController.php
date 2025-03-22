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
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $data = [];
        return view('cadastrar')->with('data', $data);
    }

    public function cadastrarCliente(Request $request)
    {

        $mensagens = [
            'email.unique' => 'Ja existe um usuario com este email',
            'email.email' => 'Digite um email válido',
            'nome.min' => 'Digite um nome com mais ssde 3 caracteres',
            'nome.max' => 'Digite um nome menos longo',
            'endereco.max' => 'Digite um endereço menor',
            'cep.min' => 'o CEP detes ter 8 numeros',
            'cpf.min' => 'Digite 11 números',
            'c_senha.same' => 'As senhas devem ser iguais',
            'senha.max' => 'Digite uma senha de até 255 caracteres'
        ];

        $request->validate([
            'email' => 'unique:usuarios|email',
            'nome' => 'min:3|max:255',
            'c_senha' => 'same:senha',
            'senha' => 'max:255',
            'endereco' => 'max:255',
            'cpf' => 'min:14',
            'cep' => 'min:9'
        ], $mensagens);

        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));
        $cep = preg_replace('/[^0-9]/', '', $request->input('cep'));

        $usuario = new Usuario();
        $usuario->fill([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $cpf,
            'senha' => Hash::make($request->input('senha'))
        ]);

        $endereco = new Endereco();
        $endereco->fill([
            'endereco' => $request->input('endereco'),
            'cep' => $cep
        ]);

        try {
            DB::transaction(function () use ($usuario, $endereco) {
                $usuario->save();
                $endereco->usuario_id = $usuario->id;
                $endereco->save();
            });

            $mensagem = 'Cadastrado com Sucesso';

            // Auth::login($usuario); // Autentica o usuário automaticamente

            return redirect()->route('home')->with('sucesso', $mensagem);
        } catch (\Exception $e) {
            DB::rollback(); //cancela a transação
            Log::error('ERRO:' . $e->getMessage());
            echo "ERRO";
        }
    }

    public function logar(Request $request)
    {
        $data = [];

        return view("login")->with('data', $data);
    }

    public function autenticar(Request $request)
    {
        //validação dos dados
        $request->validate([
            'email' => 'email',
            'senha' => 'max:255'
        ]);

        $credenciais = [
            'email' => $request->input('email'),
            // o viado do Auth quer que o campo 'senha' seja 'password'
            'password' => $request->input('senha')
        ];

        //tentativa de autenticação
        // try {
        //     if (Auth::attempt($credenciais)) {
        //         //autenticação bem sucessida
        //         $request->session()->regenerate();
        //         return redirect()->route('home');
        //     }
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        //     echo "EROROORROORO";
        // }

        if (Auth::attempt($credenciais)) {
            //autenticação bem sucessida
            $request->session()->regenerate();
            return redirect()->route('home')->with('sucesso', 'Usuário Logado');
        } else {
            //erro
            return redirect()->back()->withInput()->with('erro', 'Email ou senha incorretos.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('sucesso', 'Usuário deslogado');
    }

    public function dashborad(){
        // 
    }
}
