<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio_Inservivel extends Model
{
    use HasFactory;
    protected $table = "patrimonios_inserviveis";

    protected $fillable = ['iteminservivel', 'codigodediscricao', 'quantidadetotaldeinserviveis', 'saida_id', 'baixa_patrimonial_id', 'setor_id'];
}
