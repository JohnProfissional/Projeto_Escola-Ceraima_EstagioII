<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
    use HasFactory;
    protected $table = "devolucaos";

    protected $fillable = ['datadadevolucao', 'descricaodadevolucao', 'quantidadedevolvida', 'usuario_id', 'patrimonio_id', 'emprestimo_id']; 

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }

    public function acessarEmprestimo(){
        return $this->belongsTo(Emprestimo::class, 'emprestimo_id');
    }
}
