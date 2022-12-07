<?php

namespace App\Http\Controllers;

use App\Models\Devolucao;
use Illuminate\Http\Request;

class DevolucaoController extends Controller
{
    //
    public function show(){
        $devolucaos = Devolucao::all();
        echo $devolucaos;
    }
}
