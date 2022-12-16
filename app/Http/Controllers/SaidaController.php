<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function index(){
        $saidas = Saida::all();
        //return view('saidas.index',compact('Saida'));
        return view('saidas.index', ['saidas'=>$saidas]); //passa objeto
    }    
    //
    public function show(){
        $saidas = Saida::all();
        echo $saidas;
    }
}
