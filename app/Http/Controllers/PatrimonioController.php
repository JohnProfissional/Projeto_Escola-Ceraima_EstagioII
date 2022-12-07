<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    //
    public function show(){
        $patrimonios = Patrimonio::all();
        echo $patrimonios;
    }
}
