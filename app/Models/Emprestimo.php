<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = "emprestimos";

    protected $fillable = ['quantidadeemprestada', 'dataemprestimo', 'usuario_id', 'reserva_id', 'patrimonio_id'];

    public function acessarUsuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }

    public function acessarReserva(){
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

}
