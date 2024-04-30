@extends('layout.master') 
@section('content')
<div class="container"> <!-- conteiner bootstrap onde contém todo o conteúdo da página -->
    <div class="row justify-content-center"> <!-- Comando bootstrap que centraliza o conteúdo  -->
        <div class="col-md-8"> <!-- Esta é uma coluna bootstrap que ocupa 8 das 12 colunas disponíveis na grade, centralizando assim o formulário na página.  -->
            <div class="card"> <!-- Este é um cartão bootstrap que contém o formulário de cadastro.  -->
                <div class="card-header titulo">Cadastro Veículo:</div> <!-- Seção de cabeçalho do cartão, que contém o título "Cadastro:". -->

                <div class="card-body cadastro"> <!--  É a seção do corpo do cartão, que contém o formulário de cadastro. -->
                    <form id="formCadastro"> <!-- Este é o formulário HTML que enviará os dados para o servidor. O atributo method="POST" especifica que os dados serão enviados por meio de uma solicitação POST. O atributo action="" especifica o URL para o qual os dados serão enviados. -->
                        @csrf <!--  Este é um token de segurança CSRF,gerado automaticamente pelo Laravel para proteger contra ataques  -->

                        <div class="form-group"> <!--  Este é um grupo de formulário bootstrap. -->
                            <label for="placa">Placa:</label> <!-- Este é um rótulo de campo de formulário para o campo "placa". -->
                            <input id="placa" type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="{{ old('placa') }}" required autofocus> <!--  Este é o campo de entrada para o nome do usuário. Ele é do tipo "texto", tem uma classe "form-control" do bootstrap e é obrigatório (devido ao atributo required). O valor do campo é preenchido com o valor antigo (se houver), para que os dados não sejam perdidos em caso de erro de validação. Se houver um erro de validação para este campo, a classe "is-invalid" será adicionada para estilização.-->

                            @error('placa') <!--Esta é uma diretiva do Blade que verifica se houve um erro de validação para o campo "placa". Se houver um erro, ele exibe uma mensagem de erro.-->
                                <span class="invalid-feedback" role="alert"> <!--Esta é uma tag <span> que será usada para exibir a mensagem de erro. A classe "invalid-feedback" geralmente é estilizada para fornecer um feedback visual quando há um erro de validação no formulário.  -->
                                    <strong>{{ $message }}</strong> <!--{ $message }} é uma variável que contém a mensagem de erro específica para o campo "fone". O $message é uma variável pré-definida pelo Laravel que contém a mensagem de erro associada ao campo de formulário atualmente sendo validado. -->
                                </span>
                            @enderror <!--Usada para validação dos dados e exibi uma mensagem de erro associado a um campo espefifico, nesse caso no (placa) -->
                        </div>

                        <div class="form-group mb-3"> <!--Este é um grupo de formulário bootstrap. -->
                            <label for="usuario">Usuário:</label> 
                            <select class="form-control mt-2" name="usuario" id="usuario"> <!--Usando o Select para pegar todas as pessoas cadastradas e mostrar nas opções -->
                                <option value="">Selecione</option>
                                @foreach($registros as $registro) <!--Este é um loop foreach do Blade, que itera sobre a variável $registros recebida do backend. -->
                                    <option value="{{ $registro->name }}">{{ $registro->name }}</option value=""><!--Dentro do loop, para cada item em $registros, é criada uma opção na lista suspensa. O valor e o texto visível da opção são definidos como o nome do registro ($registro->name).-->
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"> 
                            <label for="modelo">Modelo:</label> 
                            <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{ old('modelo') }}" required autofocus> 

                            @error('modelo') 
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror 
                        </div>

                        <div class="form-group"> 
                            <label for="cor">Cor:</label> 
                            <input id="cor" type="text" class="form-control @error('cor') is-invalid @enderror" name="cor" value="{{ old('cor') }}" required autofocus> 

                            @error('cor') 
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror 
                        </div>

                        <div class="form-group"> 
                            <label for="marca">Marca:</label> 
                            <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca') }}" required autofocus> 

                            @error('marca') 
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror 
                        </div>

                        <div class="form-group mb-0 botoes-cadastro">
                            <button type="submit" class="btn btn-primary"> <!--  Este é o botão de envio do formulário. Quando clicado, enviará os dados do formulário para o servidor.-->
                                Criar Cadastro
                            </button>
                           
                            <a href="" class="btn btn-secondary" > <!--  Este é um link que permite cancelar a operação de cadastro e retornar à página anterior. No entanto, neste momento, o atributo href está vazio, então não levará a lugar nenhum. Geralmente, você colocaria o URL da página anterior aqui. -->
                                Cancelar
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formCadastro').submit(function(e){ //Todo o código dentro dessa função será executado quando o documento HTML estiver completamente carregado e pronto para ser manipulado.
            e.preventDefault(); // Evita o comportamento padrão de envio do formulário

            // Serialize o formulário para enviar os dados (Serialize: transforma em string no formato de consulta de URL,tornando mais fácil o envio do formulário)
            var formData = $(this).serialize();

            $.ajax({ //AJAX envia e recebe dados do formulário sem precisar recarregar a página inteira
                url: '{{ route("veiculos") }}', //Está enviando a URL para a rota veiculos
                type: 'POST', //Define o metodo como post
                data: formData,//Os dados que serão enviados,são serializados do formulário
                success: function(response){ //Define uma função, se a requisição dentro do ajax for bem sucedida aparece a mensagem de sucesso
                    console.log('Sucesso'); //Mostra a mensagem de sucesso
                    Swal.fire({
                    title: "Sucesso",
                    text: "Veículo cadastrado com sucesso",
                    icon: "success",
                    //Está utilizando uma biblioteca SweetAlert2
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) { //Após o envio do formulário,se o resultado for verdadeiro ele limpará os campos.
                            $("#placa").val("");//Limpa o campo placa
                            $("#usuario").val("Selecione").change();//Limpa o campo usuario
                            $("#modelo").val("");//Limpa o campo modelo
                            $("#cor").val("");//Limpa o campo cor
                            $("#marca").val("");
                            window.location.href = "{{ route('listar-veiculos') }}";//Logo após redireciona para a rota de listar-veiculos
                        }
                    });
                },
                error: function(xhr, status, error){ //Define uma função, se a requisição dentro do ajax for mal sucedida aparece a mensagem de Erro
                    console.error('Erro'); 
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "O veículo não foi cadastrado",
                        showCancelButton: false,
                        cancelButtonColor: "#d33",
                    });
                }
            });
        });
    });
</script>   