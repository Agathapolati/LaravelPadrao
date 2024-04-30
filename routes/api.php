<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VeiculosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//API:
Route::middleware('auth:sanctum')->get('/user', function (Request $request) { //'auth:sanctum: necessário autenticação usando sanctum (um pacote de autenticação para APIs), quando o usuário acessa a rota user ele recebe o request.
    return $request->user();//retorna o usuário atualmente autenticado.
});

Route::post('/editar/{id}', [PessoaController::class, 'atualizar'])->name('atualizar'); //Rota de editar do tipo Post,que chama o método atualizar do controlador 'PessoaController' e atribui o nome de 'atualizar'
Route::get('/editar/{id}', [PessoaController::class, 'excluir'])->name('excluir');//Rota de editar do tipo Get,que chama o método excluir do controlador 'PessoaController' e atribui o nome de 'excluir'
Route::get('/editar/{id}', [VeiculosController::class, 'excluir'])->name('excluir');//Rota de editar do tipo Get,que chama o método excluir do controlador 'VeiculosController' e atribui o nome de 'excluir'

//GET:É usado para solicitar dados do servidor.POST:Envia os dados para o servidor