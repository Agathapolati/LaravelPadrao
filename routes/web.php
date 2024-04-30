<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ListarVeiculosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () { //Criando uma rota para home 
    return view('home');
})->name('home');

Route::get('/cadastro', function () { //Criando uma rota para cadastro
    return view('cadastro');
})->name('cadastro');

Route::get('/cadastro-veiculo', function () { //Criando uma rota para cadastro-veiculo
    return view('cadastro-veiculo');
})->name('cadastro-veiculo');

Route::get('/editar-veiculo', function () { //Criando uma rota para editar-veiculo
    return view('editar-veiculo');
})->name('editar-veiculo');

Route::get('/listar-usuario', [ListaController::class, 'lista'])//Cria uma rota do tipo Get, que ao enviar a solicitação será encontrado no método 'lista' do controlador'ListaController'
    ->middleware('auth:pessoas')//O middleware'auth' é usado para verificar se o usuário está autenticado antes de permitir o acesso à rota. 
    ->name('listar');//define um nome para a rota, que é 'listar'

Route::get('/editar/{id}', [PessoaController::class, 'usuario']) 
    ->middleware('auth:pessoas')
    ->name('usuario');

Route::get('/cadastro-veiculo', [VeiculosController::class, 'lista'])
    ->middleware('auth:pessoas')
    ->name('cadastro-veiculo');

Route::get('/editar-veiculo', [VeiculosController::class, 'lista'])
    ->middleware('auth:pessoas')
    ->name('editar-veiculo');

Route::get('/listar-veiculos', [ListarVeiculosController::class, 'lista'])
    ->middleware('auth:pessoas')
    ->name('listar-veiculos');

Route::post('/send', [ContatoController::class, 'send'])->name('contato.send');//Define uma rota POST para /send.Associa a rota ao método send do controlador 'ContatoController'. E Nomeia a rota como 'contato.send' isso é útil para referenciar a rota pelo seu nome em vez de seu URL.
Route::post('/pessoas', [PessoaController::class, 'pessoas'])->name('pessoas');
Route::post('/veiculos', [VeiculosController::class, 'veiculos'])->name('veiculos');


// Rota para exibir o formulário de login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Rota para processar o login
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Rota para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
