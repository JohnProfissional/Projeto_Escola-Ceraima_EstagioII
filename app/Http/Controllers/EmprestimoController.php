<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    //
    public function show(){
        $emprestimos = Emprestimo::all();
        echo $emprestimos;
    }
}
