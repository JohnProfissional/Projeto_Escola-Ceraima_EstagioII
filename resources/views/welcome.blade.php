@extends('layouts.main')

@section('title', 'Tela de base')

@section('cabecalho')
<!--Na tela de login e de cadastro o cabeçalho deve ter só o nome do sistema-->

@endsection('cabecalho')

@section('content')

<div class="container mt-4 d-flex">
    <div class="col">
        <a class="btn btn-lg btn-success m-2" href="login">Tela de Login</a>
        <a class="btn btn-lg btn-success m-2" href="register">Tela de Cadastro</a>
        <a class="btn btn-lg btn-success m-2" href="perfil">Tela de Perfil</a>
        <a class="btn btn-lg btn-success m-2" href="dashboard">Tela Inicial</a>
        <a class="btn btn-lg btn-success m-2" href="reservas/create">Formulário de Reservas</a>
        <a class="btn btn-lg btn-success m-2" href="patrimonios/create">Tela de Cadastro de Itens</a>
        <a class="btn btn-lg btn-success m-2" href="categorias">Tela de Categorias</a>
        <a class="btn btn-lg btn-success m-2" href="patrimonios">Tela de Visualização de Bens Cadastrados</a>
        <a class="btn btn-lg btn-success m-2" href="patrimonios/edit">Tela de Alterar informações dos Bens</a>
        <a class="btn btn-lg btn-success m-2" href="patrimonios/delete">Tela de Exclusão dos Bens</a>
        <a class="btn btn-lg btn-success m-2" href="categorias/create">Tela de Reservas Categorias</a>
        <a class="btn btn-lg btn-success m-2" href="reservas">Tela de Reservas Bens</a>
        <a class="btn btn-lg btn-success m-2" href="reservas">Tela de Itens reservados</a>
    </div>
</div>

@endsection