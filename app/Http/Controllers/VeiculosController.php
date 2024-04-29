<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculos;

class VeiculosController extends Controller
{
    public function veiculos(Request $request)
    {
        // Validação dos dados do formulário. valida os dados preenchidos no formulário 
        $validatedData = $request->validate([ //Valida os dados preenchidos no formulário de cada coluna.
            'usuario' => 'required|string|max:255',//Valida os dados preenchidos no formulário de cada coluna(nesse caso o "usuario"),está colocando como obrigatorio e defininfo o tipo "string", com um valor máximo de 255.
            'placa' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);
 
        // Criar um novo usuário com os dados validados,após a validação de todos os campos ele salva no banco de dados 
        $user = new veiculos();
        $user->usuario = $validatedData['usuario'];//valida o campo e salva no banco de dados
        $user->placa = $validatedData['placa'];
        $user->modelo = $validatedData['modelo'];
        $user->cor = $validatedData['cor'];
        $user->marca = $validatedData['marca'];
        $user->save();
 
        // Redirecionar após salvar
        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }
}
