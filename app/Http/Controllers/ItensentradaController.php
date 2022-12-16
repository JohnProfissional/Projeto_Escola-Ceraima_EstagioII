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
    //
    public function show(){
        $itensentradas = Itensentrada::all();
        echo $itensentradas;
    }
}
