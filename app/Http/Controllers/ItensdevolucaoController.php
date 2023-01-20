<?php

namespace App\Http\Controllers;

use App\Models\Itensdevolucao;
use Illuminate\Http\Request;

class ItensdevolucaoController extends Controller
{
    public function index(){
        $itensdevolucaos = Itensdevolucao::all();
        //return view('itensdevolucaos.index',compact('Itensdevolucao'));
        return view('itensdevolucaos.index', ['itensdevolucaos'=>$itensdevolucaos]); //passa objeto
    }
    public function create(){
        return view('itensdevolucaos.create');
    }

    public function edit($id){
        $Itensdevolucao = Itensdevolucao::findorFail($id);
        return view('itensdevolucaos.edit',['Itensdevolucao'=>$Itensdevolucao]);
    }
    //
    public function show(){
        $itensdevolucaos = Itensdevolucao::all();
        echo $itensdevolucaos;
    }
}
