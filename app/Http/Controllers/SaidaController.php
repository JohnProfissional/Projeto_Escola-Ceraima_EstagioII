<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    //
    public function show(){
        $saidas = Saida::all();
        echo $saidas;
    }
}
