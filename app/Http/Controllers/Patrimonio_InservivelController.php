<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio_Inservivel;
use Illuminate\Http\Request;

class Patrimonio_InservivelController extends Controller
{
    //
    public function show(){
        $patrimonios_inserviveis = Patrimonio_Inservivel::all();
        echo $patrimonios_inserviveis;
    }
}
