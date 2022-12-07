<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    //
    public function show(){
        $manutencaos = Manutencao::all();
        echo $manutencaos;
    }
}
