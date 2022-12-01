<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reservas";

    protected $fillable = ['solicitante', 'cargo', 'patrimonio', 'codigodopatrimonio', 'datainicioreserva', 'datafimreserva', 'quantidadeitensreservados', 'patrimonio_id', 'emprestimo_id'];
}
