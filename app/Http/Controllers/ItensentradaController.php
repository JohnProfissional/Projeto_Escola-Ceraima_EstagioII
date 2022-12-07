<?php

namespace App\Http\Controllers;

use App\Models\Itensentrada;
use Illuminate\Http\Request;

class ItensentradaController extends Controller
{
    //
    public function show(){
        $itensentradas = Itensentrada::all();
        echo $itensentradas;
    }
}
