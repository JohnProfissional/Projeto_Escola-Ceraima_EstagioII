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
    //
    public function show(){
        $devolucaos = Devolucao::all();
        echo $devolucaos;
    }
}
