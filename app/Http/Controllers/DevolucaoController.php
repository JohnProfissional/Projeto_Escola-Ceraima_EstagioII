<?php

namespace App\Http\Controllers;

use App\Models\Devolucao;
use Illuminate\Http\Request;

class DevolucaoController extends Controller
{
    public function index(){
        $devolucaos = Devolucao::all();
        //return view('devolucaos.index',compact('Devolucao'));
        return view('devolucaos.index', ['devolucaos'=>$devolucaos]);
    }

    public function create(){
        return view('devolucaos.create');
    }

    public function edit($id){
        $Devolucao = Devolucao::findorFail($id);
        return view('devolucaos.edit',['Devolucao'=>$Devolucao]);
    }

    //
    public function show(){
        $devolucaos = Devolucao::all();
        echo $devolucaos;
    }
}
