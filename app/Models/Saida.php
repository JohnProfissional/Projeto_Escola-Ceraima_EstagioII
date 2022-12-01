<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;
    protected $table = "saidas ";

    protected $fillable = ['datasaida', 'statussaida', 'quantidadetotalsaida', 'usuario_id'];   
}
