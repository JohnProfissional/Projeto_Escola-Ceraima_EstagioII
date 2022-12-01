<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
    use HasFactory;
    protected $table = "devolucaos";

    protected $fillable = ['datadadevolucao', 'descricaodadevolucao', 'saida_id'];
}
