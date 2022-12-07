<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    //
    public function show(){
        $setores = Setor::all();
        echo $setores;
    }
}
