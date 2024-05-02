<div>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header titulo">
                <h2>Tabela de Veiculos:</h2>      
            </div>
            <div class="card-body">
                <table id="tabela-pessoas" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Usuário:</th>
                            <th>Placa:</th>
                            <th>Modelo:</th>
                            <th>Cor:</th>
                            <th>Marca:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($veiculos as $veiculo)
                            <tr>
                                <td>{{ $veiculo->id }}</td>
                                <td>{{ $veiculo->usuario }}</td>
                                <td>{{ $veiculo->placa }}</td>
                                <td>{{ $veiculo->modelo }}</td>
                                <td>{{ $veiculo->cor }}</td>
                                <td>{{ $veiculo->marca }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('veiculo', $veiculo->id) }}"> 
                                        Editar 
                                    </a>
                                </td>
                                <td>
                                    <button wire:click="deleteVeiculo({{ $veiculo->id }})" class="btn btn-warning">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-links">
                    {{ $veiculos->links() }}
                </div>
            </div>
        </div> 
    </div>
</div>
