<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodo extends Model
{
    use HasFactory;

    protected $table = "comodos";

    protected $fillable = ['descricaodocomodo', 'quantidadedebens', 'setor_id'];

    public function acessarSetor(){
        return $this->belongsTo(Setor::class, 'setor_id');
    }
}
