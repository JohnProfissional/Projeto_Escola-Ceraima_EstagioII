<?php

namespace App\Http\Controllers;

use App\Models\Itenssaida;
use Illuminate\Http\Request;

class ItenssaidaController extends Controller
{
    //
    public function show(){
        $itenssaidas = Itenssaida::all();
        echo $itenssaidas;
    }
}
