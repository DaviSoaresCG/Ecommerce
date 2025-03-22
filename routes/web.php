<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])
    ->name('home');

Route::match(['get', 'post'], '/categoria', [ProdutoController::class, 'categoria'])->name('categoria');

Route::match(['get', 'post'], '/{idcategoria}/categoria', [ProdutoController::class, 'categoria'])->name('categoria_por_id');

Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');

Route::match(['get', 'post'], '/logar', [ClienteController::class, 'logar'])->name('login');

Route::match(['get', 'post'], '/login', [ClienteController::class, 'autenticar'])->name('autenticar');

Route::get('/sair', [ClienteController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar_cliente');

Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');

Route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'verCarrinho'])->name('ver_carrinho');

Route::match(['get', 'post'], '/{indice}/removerCarrinho', [ProdutoController::class, 'removerCarrinho'])->name('remover_carrinho');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->name('dashboard');
});

Route::post('/carrinho/finalizar_carrinho', [ProdutoController::class, 'finalizarCarrinho'])->name('finalizar_carrinho');

Route::match(['get', 'post'], '/compras/historico', [ProdutoController::class, 'historico'])->name('historico');
