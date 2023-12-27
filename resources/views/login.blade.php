@extends('layouts.main')

@section('title', 'Login')

@section('cabecalho')

@endsection('cabecalho')

@section('content')

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="p-4 p-md-5 cardLoginCadastro bg-light">
                @csrf

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                    </div>
                </div>

                <div class="row">
                    <label for="email" class="m-2 textoAzul3">Email</label>
                    <div class="form-floating">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Digite seu Email">
                    </div>
                </div>

                <div class="row">
                    <label for="password" class="m-2 textoAzul3">Senha</label>
                    <div class="form-floating">
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha">
                    </div>
                </div>

                <div class="checkbox textoAzul3 m-3">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Guardar Login?') }}</span>
                    </label>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center m-1" style="text-align:right">
                        <button class="btn btn-lg botoes">
                            {{ __('ENTRAR') }}
                        </button>
                    </div>

                    <div class="d-flex justify-content-center">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="text-decoration: none; color: var(--azul-cabecalho);">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection