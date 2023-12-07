@extends('layouts.main')

@section('title', 'Cadastro')

@section('cabecalho')
<!--Na tela de login e de cadastro o cabeçalho deve ter só o nome do sistema q é definido no layout main-->
@endsection('cabecalho')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="form-cadastro" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-center">
                    <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                </div>
            </div>

            <div class="d-flex justify-content-center"><br>
                <strong>
                    <p style="color: var(--azul-cabecalho);">Preencha com suas informações!</p>
                </strong>
            </div>

            <!-- Name -->
            <div class="row">
                <x-label class="m-2 textoAzul3" for="name" :value="__('Nome')" />
                <div class="form-floating">
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
            </div>

            <!-- CPF Address -->
            <div class="row">
                <x-label class="m-2 textoAzul3" for="cpf" :value="__('CPF')" />
                <div class="form-floating">
                    <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required />
                </div>
            </div>

            <!-- Cargo -->
            <div>
                <x-label class="m-2 textoAzul3" for="cargo" :value="__('Cargo')" />
                <div class="form-floating">
                    <x-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo')" required autofocus />
                </div>
            </div>

            <!-- Email Address -->
            <div class="row">
                <x-label class="m-2 textoAzul3" for="email" :value="__('Email')" />
                <div class="form-floating">
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
            </div>

            <!-- Password -->
            <div class="row">
                <x-label class="m-2 textoAzul3" for="password" :value="__('Senha')" />
                <div class="form-floating">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="row">
                <x-label class="m-2 textoAzul3" for="password_confirmation" :value="__('Confirme sua Senha')" />
                <div class="form-floating">
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já possui uma conta?') }}
                </a>

                <div class="d-flex justify-content-center m-3" style="text-align:right; text-decoration: none;">
                    <x-button class="ml-4" class="btn btn-lg botoes" style="background: var(--azul-cabecalho);">
                        {{ __('Cadastrar') }}
                    </x-button>
                </div>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>

<p class="error-validation template"></p>

@endsection('content')