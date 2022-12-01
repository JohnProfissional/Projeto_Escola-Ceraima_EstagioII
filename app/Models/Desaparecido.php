<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desaparecido extends Model
{
    use HasFactory;
    protected $table = "desaparecidos";

    protected $fillable = ['descricaoitem', 'numeroitem', 'quantidadesumida', 'patrimonio_id'];
}
