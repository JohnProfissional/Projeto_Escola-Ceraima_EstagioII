<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itensentrada extends Model
{
    use HasFactory;
    protected $table = "itensentradas";

    protected $fillable = ['codbem', 'descricaodobem', 'tombo', 'valordobem', 'historicodatransferencia', 'numerodanotafiscal', 'datadanotafiscal', 'quantidade', 'entrada_id', 'patrimonio_id'];
}
