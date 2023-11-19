@extends('layouts.main')

@section('titulo', 'Cadastro')

@section('cabecalho')
<!--Na tela de login e de cadastro o cabeçalho deve ter só o nome do sistema q é definido no layout main-->
@endsection('cabecalho')

@section('conteudo')

@section('titulo','Cadastro de Sala')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 cardLoginCadastro bg-light" id="form-cadastro" action="{{route('sala.store')}}" method="POST">

                <div class="row">
                    <div class="d-flex justify-content-center">
                        <p class="sinalBemVindo pt-3 pb-3 ps-5 pe-5" style="font-size: 20px;">Bem vindo/a ao CadPatri</p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <p style="color: var(--texto-1);">Preencha com suas informações</p>
                    </div>
                </div>

                <div class="row">
                    <label for="inputNome" class="m-2 textoAzul3">Nome</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="inputCPF" placeholder="Fulano de tal" data-min-length="3">
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

                <div class="row">
                    <label for="inputSenhaConfirmacao" class="m-2 textoAzul3">Confirme a senha</label>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="inputSenha" placeholder="******">
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center m-3" style="text-align:right">
                        <button type="submit" id="botaoCadastrar" class="btn btn-lg botoes">
                            <a href="{{ route('sistema.home')}}" style="color: #fff; text-decoration: none;">CADASTRAR</a>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <p class="error-validation template"></p>
    </div>
</div>

@endsection('conteudo')