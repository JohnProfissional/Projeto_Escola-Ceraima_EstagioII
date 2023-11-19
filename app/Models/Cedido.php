<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedido extends Model
{
    use HasFactory;

    protected $table = "cedidos";

    protected $fillable = ['descrpatrimonio', 'tombopatri', 'instituicaoreceptora', 'qtd', 'saida_id'];

    public function saida(){
        return $this->belongsTo(Saida::class, 'saida_id');
    }
}
