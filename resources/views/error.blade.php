@extends('layouts.main')

@section('title', 'CadPatri - Error')

@section('cabecalho')

@endsection('cabecalho')

@section('content')

<div class="welcome-container">
    <h1>Erro: Página não encontrada ou acesso não autorizado.</h1>
    <h3>Você será redirecionado para a página anterior.</h3><br>
    <a href="javascript:history.back()" class="btn btn-danger back-button">Voltar</a>
</div>

@endsection