<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(){
        $reservas = Reserva::all();
        //return view('reservas.index',compact('Reserva'));
        return view('reservas.index', ['reservas'=>$reservas]); //passa objeto
    }   
    
    public function create(){
        return view('reservas.create');
    }

    public function edit($id){
        $Reserva = Reserva::findorFail($id);
        return view('reservas.edit',['Reserva'=>$Reserva]);
    }
    //
    public function show(){
        $reservas = Reserva::all();
        echo $reservas;
    }
}
