@extends('layouts.main')

@section('title', 'Cadastro')

@section('cabecalho')
<!--Na tela de login e de cadastro o cabeçalho deve ter só o nome do sistema q é definido no layout main-->
@endsection('cabecalho')

@section('content')

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <form class="p-4 p-md-5 cardLoginCadastro bg-light" id="form-cadastro" method="POST" action="{{ route('register-user') }}">
                @csrf

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                    </div>
                </div>

                <div class="row">
                    <label for="inputNome" class="m-2 textoAzul3">Nome</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="inputNome" placeholder="Digite seu Nome" data-min-length="3" :value="old('name')" required autofocus>
                    </div>
                </div>

                <div class="row">
                    <label for="inputCPF" class="m-2 textoAzul3">CPF</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="inputCPF" placeholder="000.000.000-00" required>
                    </div>
                </div>

                <div class="row">
                    <label for="inputEmail" class="m-2 textoAzul3">Email</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Digite seu Email" :value="old('email')" required>
                    </div>
                </div>

                <div class="row">
                    <label for="inputSenha" class="m-2 textoAzul3">Senha</label>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" class="block mt-1 w-full" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row">
                    <label for="inputSenhaConfirmacao" class="m-2 textoAzul3">Confirme sua senha</label>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Digite sua senha novamente">
                    </div>
                </div>

                <div class="d-flex justify-content-center m-3" style="text-align:right">
                    <x-button class="ml-4" class="btn btn-lg botoes">
                        {{ __('Cadastrar') }}
                    </x-button>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" style="text-decoration: none; margin-top: 25px;">
                        <p style="color: var(--azul-cabecalho);">Já tenho uma conta!</p>
                    </a>
                </div>
            </form>

        </div>

        <p class="error-validation template"></p>

    </div>
</div>

@endsection('content')