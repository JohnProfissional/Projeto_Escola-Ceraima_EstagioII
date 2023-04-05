<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    use HasFactory;
    protected $table = "patrimonios ";

    protected $fillable = ['orgao', 'unidorcamentaria', 'centrodecusto', 'nomedopatrimonio', 'codigo', 'descricao', 
    'numeropatrimonio', 'valor', 'historico', 'numeronotafiscal', 'datanotafiscal', 'valortotaldosbens', 'totaldebens',
     'dataaquisicao', 'setor_id'];
}

