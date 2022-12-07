<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    //
    public function show(){
        $entradas = Entrada::all();
        echo $entradas;
    }
}
