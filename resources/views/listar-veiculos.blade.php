@extends('layout.master') 

@section('content')
<br></br>
<div class="container">
    <div class="card">
        <div class="card-header titulo">
            <h2>Tabela de Veiculos:</h2>  <!--Titulo da página-->         
        </div>
        <div class="card-body">
            <table id="tabela-pessoas" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID:</th> <!--Nome das colunas na página HTML -->
                        <th>Usuário:</th> <!--Nome das colunas na página HTML -->
                        <th>Placa:</th>
                        <th>Modelo:</th>
                        <th>Cor:</th>
                        <th>Marca:</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($veiculos as $veiculo)  <!--Inicia um loop foreach sobre a lista de objetos $veiculos, onde cada objeto é referenciado como $veiculo.-->
                        <tr><!--Insere mais uma linha na tabela HTML -->
                            <td>{{ $veiculo->id }}</td><!-- Cria uma célula na tabela que exibe o atributo id do objeto $veiculo. -->
                            <td>{{ $veiculo->usuario }}</td><!-- Cria uma célula na tabela que exibe o atributo usuario do objeto $veiculo. -->
                            <td>{{ $veiculo->placa }}</td>
                            <td>{{ $veiculo->modelo }}</td>
                            <td>{{ $veiculo->cor }}</td>
                            <td>{{ $veiculo->marca }}</td>
                            <td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('usuario', $veiculo->id) }}"><!--Botão editar, redirecionando para a rota usuario-->
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('excluir', $veiculo->id) }}"><!--Botão excluir, redirecionando para a rota excluir-->
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
@endsection

@section('script')
@endsection
