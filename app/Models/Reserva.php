<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reservas";

    protected $fillable = ['datareserva', 'quantidadeitensreservados', 'usuario_id', 'patrimonio_id'];

    public function acessarUsuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }
}
