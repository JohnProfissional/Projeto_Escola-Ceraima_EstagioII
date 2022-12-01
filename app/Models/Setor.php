<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
    protected $table = "setores";

    protected $fillable = ['descricaodosetor', 'nomebem', 'numerodebem', 'quantidadedebem', 'saida_id'];
}
