<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(){
        $entradas = Entrada::all();
        //return view('entradas.index',compact('Entrada'));
        return view('entradas.index', ['entradas'=>$entradas]); //passa objeto
    }

    public function create(){
        return view('entradas.create');
    }

    public function edit($id){
        $Entrada = Entrada::findorFail($id);
        return view('entradas.edit',['Entrada'=>$Entrada]);
    }
    //
    public function show(){
        $entradas = Entrada::all();
        echo $entradas;
    }
}
