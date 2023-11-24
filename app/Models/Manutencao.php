<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;
    protected $table = "manutencaos";

    protected $fillable = ['empresa', 'dataprevistadeentrega', 'totaldasaidadebens', 'dataentrada', 'datasaida', 'patrimonio_id'];

    public function acessarPatrimonio(){
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }
}
