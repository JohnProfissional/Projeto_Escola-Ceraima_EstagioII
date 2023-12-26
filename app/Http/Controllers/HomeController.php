<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function perfil()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('perfil', ['user' => $user]);
        }
        return redirect()->route('login');
    }

    public function editPerfil()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('editar-perfil', ['user' => $user]);
        }
        return redirect()->route('login');
    }

    public function updatePerfil(Request $request)
    {
        $user = User::find($request->id);
        $user->fill($request->except('_token', 'password'));
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('perfil')->with('msg', 'Alteração realizada com sucesso');
    } 

}
