<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio_Inservivel;
use Illuminate\Http\Request;

class Patrimonio_InservivelController extends Controller
{
    public function index(){
        $patrimoniosinserviveis = Patrimonio_Inservivel::all();
        //return view('patrimoniosinserviveis.index',compact('Patrimonio_Inservivel'));
        return view('patrimoniosinserviveis.index', ['patrimoniosinserviveis'=>$patrimoniosinserviveis]); //passa objeto
    } 
    //
    public function show(){
        $patrimonios_inserviveis = Patrimonio_Inservivel::all();
        echo $patrimonios_inserviveis;
    }
}
