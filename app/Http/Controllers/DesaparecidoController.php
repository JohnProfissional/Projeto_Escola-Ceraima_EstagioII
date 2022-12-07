<?php

namespace App\Http\Controllers;

use App\Models\Desaparecido;
use Illuminate\Http\Request;

class DesaparecidoController extends Controller
{
    //
    public function show(){
        $desaparecidos = Desaparecido::all();
        echo $desaparecidos;
    }
}
