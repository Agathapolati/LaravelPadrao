<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //importa algumas classes necessárias para o funcionamento do controlador
use Illuminate\Support\Facades\Auth; //  (um modelo que representa uma entidade de pessoas no banco de dados).
use App\Models\Pessoas; // Alterado de 'Pessoa' para 'Pessoas'

class AuthController extends Controller //Define a classe AuthController, que herda de Controller (lida com a autenticação de usuário)
{
    public function showLoginForm() //retorna a view 'auth.login', é responsável por exibir o formulário de login
    {
        return view('auth.login');
    }

    public function login(Request $request) //recebe um objeto Request como parâmetro, que contém os dados enviados pelo formulário de login.
    {
        $credentials = $request->only('email', 'password');

        // Verifica as credenciais na tabela 'pessoas'

        if (Auth::guard('pessoas')->attempt($credentials)) { //guard autentica o usuario "pessoas", se os campos do banco de dados estiverem certos ele ira para pagina listar-usuario
            // Autenticação bem-sucedida
            return redirect()->intended('listar-usuario'); //Após o login ser efetuado com sucesso, redireciona para a página de listar-usuarios
        }

        return back()->withErrors(['email' => 'Dados incorretos'])->withInput($request->only('email')); //Se os dados de login estiverem errados(não estiver salvo no banco de dados ele retorna um erro.)
    }



    public function logout() //encerra a sessão do usuário e, em seguida, redireciona o usuário de volta para a página de login.
    {
        Auth::logout(); //Um guard é uma fonte de autenticação do laravel.
        return redirect('/login');
    }
}
