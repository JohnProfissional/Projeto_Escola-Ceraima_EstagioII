<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bemexcedente extends Model
{
    use HasFactory;
    protected $table = "bensexcedentes";

    protected $fillable = ['descricaodoexcedente', 'observacoes', 'quantidadeexcedente', 'usuario_id'];   

    public function acessarUsuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
