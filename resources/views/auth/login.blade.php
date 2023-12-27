@extends('layouts.main')

@section('title', 'Login')

@section('cabecalho')

@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row">
                <div class="d-flex justify-content-center">
                    <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                </div>
            </div>

            <div class="row">
                <x-label class="m-2 textoAzul3" for="email" :value="__('Email')" />
                <div class="form-floating">
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Digite seu Email" />
                </div>
            </div>

            <div class="row">
                <x-label class="m-2 textoAzul3" for="password" :value="__('Senha')" />
                <div class="form-floating">
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua Senha" />
                </div>
            </div>

            <div class="checkbox textoAzul3 m-3">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Guardar Login?') }}</span>
                </label>
            </div>

            <x-button class="ml-3" style="margin: auto;display: block;">
                {{ __('Entrar') }}
            </x-button>

            <div style="margin-top: 30px;">
                <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-decoration: none; color: var(--azul-cabecalho);">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection