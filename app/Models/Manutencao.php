<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;
    protected $table = "manutencaos";
    protected $guarded =[''];


    public function patrimonio()
    {
        return $this->belongsTo(patrimonio::class);
    }
}
