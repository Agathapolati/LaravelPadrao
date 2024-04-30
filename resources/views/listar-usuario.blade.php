@extends('layout.master') 

@section('content')
<br></br>
<div class="container">
    <div class="card">
        <div class="card-header titulo">
            <h2>Tabela de Cadastros:</h2> <!--Titulo da página-->     
        </div>
        <div class="card-body">
            <table id="tabela-pessoas" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID:</th> <!--Nome das colunas na página HTML -->
                        <th>Nome:</th>
                        <th>E-mail:</th>
                        <th>CPF:</th>
                        <th>Telefone:</th>
                        <th>Data de Nascimento:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pessoas as $pessoa) <!--Inicia um loop foreach sobre a lista de objetos $pessoas, onde cada objeto é referenciado como $pessoa.-->
                        <tr><!--Insere mais uma linha na tabela HTML -->
                            <td>{{ $pessoa->id }}</td><!-- Cria uma célula na tabela que exibe o atributo id do objeto $pessoa. -->
                            <td>{{ $pessoa->name }}</td><!-- Cria uma célula na tabela que exibe o atributo name do objeto $pessoa.-->
                            <td>{{ $pessoa->email }}</td>
                            <td>{{ $pessoa->cpf }}</td>
                            <td>{{ $pessoa->telefone }}</td>
                            <td>{{ \Carbon\Carbon::parse($pessoa->data_nascimento)->format('d/m/Y') }}</td> <!--Na data de nascimento ele coloca um formato para exibir data/mes/ano-->
                            <td>
                                <a class="btn btn-primary" href="{{ route('usuario', $pessoa->id) }}"> <!--Botão editar, redirecionando para a rota usuario-->
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('excluir', $pessoa->id) }}"> <!--Botão excluir, redirecionando para a rota excluir-->
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<livewire:counter /> 
@endsection

@section('script')
@endsection
