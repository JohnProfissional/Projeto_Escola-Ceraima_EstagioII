<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baixa_Patrimonial extends Model
{
    use HasFactory;
    
    protected $table = "baixas_patrimoniais";

    protected $fillable = ['responsavelentregar', 'datadabaixa', 'encarregadodaretirada', 'quantidaderetirada', 'patrimonio_id'];

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }
}
 