<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itensdevolucao extends Model
{
    use HasFactory;
    protected $table = "itensdevolucaos";

    protected $fillable = ['nomedobem', 'codigoidentificacaodobem', 'quantidadedevolvida', 'devolvedor', 'recebedor', 'devolucao_id', 'patrimonio_id'];
}
