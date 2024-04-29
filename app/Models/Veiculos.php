<?php

namespace App\Models; // criando o model, nome das colunas no banco de dados 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    use HasFactory;

    protected $fillable = [ //Criando o nome das colunas no banco de dados
        'usuario',
        'placa',
        'modelo',
        'cor',
        'marca'
    ];

}
