<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index(){
        $manutencaos = Manutencao::all();
        //return view('manutencaos.index',compact('Manutencao'));
        return view('manutencaos.index', ['manutencaos'=>$manutencaos]); //passa objeto
    }

    public function create(){
        return view('manutencaos.create');
    }

    public function edit($id){
        $Manutencao = Manutencao::findorFail($id);
        return view('manutencaos.edit',['Manutencao'=>$Manutencao]);
    }
    //
    public function show(){
        $manutencaos = Manutencao::all();
        echo $manutencaos;
    }
}
