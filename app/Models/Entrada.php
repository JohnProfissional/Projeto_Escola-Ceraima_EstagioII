<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = "entradas";

    protected $fillable = ['datadatransferencia', 'unidadeanterior', 'centrodecustoanterior', 'novaunidade', 'centrodecustodestino', 'valortotaldosbens', 'numerodanotafiscal', 'datadanotafiscal', 'quantidadetotal', 'orgao', 'unidadeorcamentaria', 'totaldebens'];
}
