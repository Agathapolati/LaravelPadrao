<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //Criando uma nova classe que estende a classe "migration", está criando uma tabela chamada 'veiculos' com várias colunas associadas a informações de veículos 
{
    /**
     * Run the migrations.
     */
    public function up(): void //método up defini as operações que serão executadas, quando a migração for aplicada ou revertida
    {
        Schema::create('veiculos', function (Blueprint $table) { //Criando uma tabela chamada "veiculos" no banco de dados
            $table->id(); //Criando o nome das colunas que serão exibidas no banco de dados 
            $table->string('usuario');
            $table->string('placa');
            $table->string('modelo');
            $table->string('cor');
            $table->string('marca');
            $table->timestamps();//São usadas para registrar a data e hora de criação e atualização de registros.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void  //ele está usando o facade Schema para excluir a tabela 'veiculos' se a migração for revertida.
    {
        Schema::dropIfExists('veiculos'); //Essa função verifica se uma tabela existe no banco de dados e, se existir, a exclui.
    }
};
