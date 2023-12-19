<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bemexcedente extends Model
{
    use HasFactory;
    protected $table = "bensexcedentes";

    protected $fillable = ['descricao', 'observacoes', 'quantidadeexcedente', 'comodo_id']; 
    
    public function acessarComodo(){
        return $this->belongsTo(Comodo::class, 'comodo_id');
    }
}
