<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedido extends Model
{
    use HasFactory;

    protected $table = "cedidos";

    protected $fillable = ['instituicaoreceptora', 'datacedido', 'qtd', 'patrimonio_id'];

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    } 
}
