<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    use HasFactory;
    protected $table = "patrimonios";

    protected $fillable = ['entrada_id', 'comodo_id', 'descricaodopatrimonio', 'tombo', 'valordobem', 'historicodatransferencia', 'dataaquisicao', 'status'];

    public function acessarEntrada(){
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }

    public function acessarComodo(){
        return $this->belongsTo(Comodo::class, 'comodo_id');
    }
}

