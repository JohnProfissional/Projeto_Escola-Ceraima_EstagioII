<?php

namespace App\Http\Controllers;

use App\Models\Itenssaida;
use Illuminate\Http\Request;

class ItenssaidaController extends Controller
{
    public function index(){
        $itenssaidas = Itenssaida::all();
        //return view('itenssaidas.index',compact('Itenssaida'));
        return view('itenssaidas.index', ['itenssaidas'=>$itenssaidas]); //passa objeto
    }

    public function create(){
        return view('itenssaidas.create');
    }

    public function edit($id){
        $Itenssaida = Itenssaida::findorFail($id);
        return view('itenssaidas.edit',['Itenssaida'=>$Itenssaida]);
    }
    //
    public function show(){
        $itenssaidas = Itenssaida::all();
        echo $itenssaidas;
    }
}
