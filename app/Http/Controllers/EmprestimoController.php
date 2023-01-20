<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(){
        $emprestimos = Emprestimo::all();
        //return view('emprestimos.index',compact('Emprestimo'));
        return view('emprestimos.index', ['emprestimos'=>$emprestimos]); //passa objeto
    }

    public function create(){
        return view('emprestimos.create');
    }

    public function edit($id){
        $Emprestimo = Emprestimo::findorFail($id);
        return view('emprestimos.edit',['Emprestimo'=>$Emprestimo]);
    }
    //
    public function show(){
        $emprestimos = Emprestimo::all();
        echo $emprestimos;
    }
}
