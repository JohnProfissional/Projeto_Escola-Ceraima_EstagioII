<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodo extends Model
{
    use HasFactory;

    protected $table = "comodos";

    protected $fillable = ['identificacaodocomodo', 'identificacaodobem', 'numerodobem', 'quantidadedobem', 'setor_id'];

    public function setor(){
        return $this->belongsTo(Setor::class, 'setor_id');
    }
}
