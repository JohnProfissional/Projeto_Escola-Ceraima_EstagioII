<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    public function index(){
        $patrimonios = Patrimonio::all();
        //return view('patrimonios.index',compact('Patrimonio'));
        return view('patrimonios.index', ['patrimonios'=>$patrimonios]); //passa objeto
    }    

    public function create(){
        return view('patrimonios.create');
    }

    public function edit($id){
        $Patrimonio = Patrimonio::findorFail($id);
        return view('patrimonios.edit',['Patrimonio'=>$Patrimonio]);
    }
    
    //
    public function show(){
        $patrimonios = Patrimonio::all();
        echo $patrimonios;
    }
}
