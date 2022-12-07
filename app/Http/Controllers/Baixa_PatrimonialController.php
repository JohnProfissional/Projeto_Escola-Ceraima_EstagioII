<?php

namespace App\Http\Controllers;

use App\Models\Baixa_Patrimonial;
use Illuminate\Http\Request;

class Baixa_PatrimonialController extends Controller
{
    //
    public function show(){
        $baixas_patrimoniais = Baixa_Patrimonial::all();
        echo $baixas_patrimoniais;
    }
}
