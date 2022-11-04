<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Sala;
use App\Models\Evento;
use App\Models\patrimonio;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reservas";
    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function patrimonio()
    {
        return $this->belongsTo(patrimonio::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class,'eventos_id','id');
    }
}
