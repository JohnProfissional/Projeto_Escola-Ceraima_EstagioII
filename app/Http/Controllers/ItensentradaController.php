<?php

namespace App\Http\Controllers;

use App\Models\Itensentrada;
use Illuminate\Http\Request;

class ItensentradaController extends Controller
{
    public function index(){
        $itensentradas = Itensentrada::all();
        //return view('itensentradas.index',compact('Itensentrada'));
        return view('itensentradas.index', ['itensentradas'=>$itensentradas]); //passa objeto
    }

    public function create(){
        return view('itensentradas.create');
    }

    public function edit($id){
        $Itensentrada = Itensentrada::findorFail($id);
        return view('itensentrada.edit',['Itensentrada'=>$Itensentrada]);
    }
    //
    public function show(){
        $itensentradas = Itensentrada::all();
        echo $itensentradas;
    }
}
