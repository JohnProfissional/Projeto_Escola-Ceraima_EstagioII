<?php

namespace App\Http\Controllers;

use App\Models\Bemexcedente;
use Illuminate\Http\Request;

class BemexcedenteController extends Controller
{
    public function index(){
        $bensexcedentes = Bemexcedente::all();
        //return view('bensexcedentes.index',compact('Bemexcedente'));
        return view('bensexcedentes.index', ['bensexcedentes'=>$bensexcedentes]);
    }

    public function create(){
        return view('bensexcedentes.create');
    }   
    
    public function edit($id){
        $Bemexcedente = Bemexcedente::findorFail($id);
        return view('bensexcedentes.edit',['Bemexcedente'=>$Bemexcedente]);
    }

    //
    public function show(){
        $bensexcedentes = Bemexcedente::all();
        echo $bensexcedentes;
    }
}
