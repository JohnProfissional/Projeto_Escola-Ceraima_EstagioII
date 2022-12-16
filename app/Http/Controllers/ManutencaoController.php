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
    //
    public function show(){
        $manutencaos = Manutencao::all();
        echo $manutencaos;
    }
}
