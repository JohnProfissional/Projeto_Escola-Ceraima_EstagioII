<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index(){
        $usuarios = Usuario::all();
        //return view('usuarios.index',compact('Usuario'));
        return view('usuarios.index', ['usuarios'=>$usuarios]); //passa objeto
    }

    public function create(){
        return view('usuarios.create');
    }

    public function edit($id){
        $Usuario = Usuario::findorFail($id);
        return view('usuarios.edit',['Usuario'=>$Usuario]);
    }
    

    public function show(){
        $usuarios = Usuario::all();
        echo $usuarios;
    }
}
