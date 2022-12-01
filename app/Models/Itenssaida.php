<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itenssaida extends Model
{
    use HasFactory;
    protected $table = "itenssaidas";

    protected $fillable = ['descricaodopatrimonio', 'codigopatrimonio', 'quantidadesaida', 'saida_id', 'patrimonio_id'];
}
