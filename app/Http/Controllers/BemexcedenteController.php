<?php

namespace App\Http\Controllers;

use App\Models\Bemexcedente;
use Illuminate\Http\Request;

class BemexcedenteController extends Controller
{
    //
    public function show(){
        $bensexcedentes = Bemexcedente::all();
        echo $bensexcedentes;
    }
}
