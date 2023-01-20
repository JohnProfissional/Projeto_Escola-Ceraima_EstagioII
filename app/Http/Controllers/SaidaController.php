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

    public function create(){
        return view('saidas.create');
    }

    public function edit($id){
        $Saida = Saida::findorFail($id);
        return view('saidas.edit',['Saida'=>$Saida]);
    }
    //
    public function show(){
        $saidas = Saida::all();
        echo $saidas;
    }
}
