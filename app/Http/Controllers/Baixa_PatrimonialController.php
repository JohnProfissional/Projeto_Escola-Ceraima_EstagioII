<?php

namespace App\Http\Controllers;

use App\Models\Baixa_Patrimonial;
use Illuminate\Http\Request;

class Baixa_PatrimonialController extends Controller
{
    public function index(){
        $baixaspatrimoniais = Baixa_Patrimonial::all();
        //return view('baixaspatrimoniais.index',compact('Baixa_Patrimonial'));
        return view('baixaspatrimoniais.index', ['baixaspatrimoniais'=>$baixaspatrimoniais]);
    }
    
    public function create(){
        return view('baixaspatrimoniais.create');
    }

    public function edit($id){
        $Baixa_Patrimonial = Baixa_Patrimonial::findorFail($id);
        return view('baixaspatrimoniais.edit',['Baixa_Patrimonial'=>$Baixa_Patrimonial]);
    }
    
    public function show(){
        $baixas_patrimoniais = Baixa_Patrimonial::all();
        echo $baixas_patrimoniais;
    }
}
