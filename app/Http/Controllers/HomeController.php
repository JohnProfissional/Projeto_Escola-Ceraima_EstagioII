<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Recupera o usuário autenticado
            $user = Auth::user();

            return view('perfil', ['user' => $user]);
        }

        // Caso não esteja autenticado, redireciona para a página de login ou para onde preferir
        return redirect()->route('login');
    }
}
