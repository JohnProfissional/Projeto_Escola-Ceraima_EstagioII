<?php

namespace App\Http\Controllers;

use App\Models\Itensdevolucao;
use Illuminate\Http\Request;

class ItensdevolucaoController extends Controller
{
    //
    public function show(){
        $itensdevolucaos = Itensdevolucao::all();
        echo $itensdevolucaos;
    }
}
