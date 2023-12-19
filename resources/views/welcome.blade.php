@extends('layouts.main')

@section('title', 'CadPatri')

@section('cabecalho')
<!--Cabecalho das telas (fora login e cadastro)-->

@endsection('cabecalho')

@section('content')

<div class="welcome-container">
    <h1>Bem-vindo ao CadPatri!</h1>
    <h3>Faça Login para acessar o sistema. Se não tem uma conta, entre em contato com um Administrador.</h3>
    <a href="{{ route('login') }}" class="btnWelcome">Login</a>
</div>

@endsection