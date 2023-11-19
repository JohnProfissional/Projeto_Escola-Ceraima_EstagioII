@extends('layouts.main')

@section('title', 'Login')

@section('cabecalho')
<!--Na tela de login e de cadastro o cabeçalho deve ter só o nome do sistema q é definido no layout main-->

@endsection('cabecalho')

@section('content')

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">

            <form class="p-4 p-md-5 cardLoginCadastro bg-light" action="" method="">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <p style="color: var(--azul-cabecalho);">Efetue login para entrar</p>
                    </div>
                </div>

                <div class="row">
                    <label for="inputCPF" class="m-2 textoAzul3">CPF</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="inputCPF" placeholder="000.000.000-00">
                    </div>
                </div>

                <div class="row">
                    <label for="inputSenha" class="m-2 textoAzul3">Senha</label>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="inputSenha" placeholder="******">
                    </div>
                </div>

                <div class="checkbox textoAzul3 m-3">
                    <label>
                        <input type="checkbox" value="guardarLogin"> Guardar login?
                    </label>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center m-1" style="text-align:right">
                        <button class="btn btn-lg botoes" type="submit">
                            <a href="{{ route('sistema.home')}}" style="color: #fff; text-decoration: none;"> ENTRAR</a>
                        </button>
                    </div>

                    <p class="d-flex justify-content-center m-1 textoAzul3">ou</p>

                    <div class="d-flex justify-content-center m-1">
                        <a class="btn btn-lg botoes" href="{{ route('user.cadastro')}}">CADASTRAR</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection