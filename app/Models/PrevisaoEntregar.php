<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrevisaoEntregar extends Model
{
    use HasFactory;
    protected $table = "previsao_entregas";
    protected $guarded =[''];

    public function patrimonio()
    {
        return $this->belongsTo(patrimonio::class);
    }

    public function manutencao()
    {
        return $this->belongsTo(Manutencao::class);
    }
}
