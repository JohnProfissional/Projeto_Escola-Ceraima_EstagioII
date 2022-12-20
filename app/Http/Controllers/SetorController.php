<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index(){
        $setores = Setor::all();
        //return view('setores.index',compact('Setor'));
        return view('setores.index', ['setores'=>$setores]); //passa objeto
    }    

    public function create(){
        return view('setores.create');
    }

    public function show(){
        $setores = Setor::all();
        echo $setores;
    }
}
