<?php

namespace App\Http\Controllers;

use App\Models\Desaparecido;
use Illuminate\Http\Request;

class DesaparecidoController extends Controller
{
    public function index(){
        $desaparecidos = Desaparecido::all();
        //return view('desaparecidos.index',compact('Desaparecido'));
        return view('desaparecidos.index', ['desaparecidos'=>$desaparecidos]);
    }

    public function create(){
        return view('desaparecidos.create');
    }
    //
    public function show(){
        $desaparecidos = Desaparecido::all();
        echo $desaparecidos;
    }
}
