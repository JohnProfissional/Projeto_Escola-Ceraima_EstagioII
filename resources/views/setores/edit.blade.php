@extends('layouts.main')

@section('title', 'Editar Setor')

@section('cabecalho')
<!--Cabecalho das telas (fora login e cadastro)-->

<div class="d-flex cabecalho2">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-row-reverse" id="menuNavbar">
        <ul class="navbar-nav me-auto ">
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('dashboard')}}">
                Início
                <svg class="bi bi-house m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
            </a>
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('perfil')}}">
                Perfil
                <svg class="bi bi-person-circle m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('login')}}">
                Sair
                <svg class="bi bi-box-arrow-right m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
            </a>
        </ul>
    </div>

    <button class="cabecalho2">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
    </button>

</div>

@endsection('cabecalho')

@section('content')

<div>
    <nav class="navbar">
        <div class="col ms-2 ">
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="modal fade" id="menuLateral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Menu
                    </h5>
                    <button type="button" class="botoes" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg>
                    </button>
                </div>

                <div class="modal-body">
                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('dashboard') }}">
                        <i class="bi bi-house"></i>
                        Tela inicial
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('perfil') }}">
                        <i class="bi bi-person-circle"></i>
                        Perfil
                    </a>

                    @can('access')
                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('usuarios.index') }}">
                        <i class="bi bi-people"></i>
                        Usuários
                    </a>
                    @endcan

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('entradas.index') }}">
                        <i class="bi bi-folder-plus"></i>
                        Entrada de Patrimônios
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('patrimonios.index') }}">
                        <i class="bi bi-folder-plus"></i>
                        Patrimônios
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('bensexcedentes.index') }}">
                        <i class="bi bi-box-arrow-up-right"></i>
                        Bens Excedentes
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('cedidos.index') }}">
                        <i class="bi bi-person-lines-fill"></i>
                        Cedidos
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('manutencoes.index') }}">
                        <i class="bi bi-tools"></i>
                        Em Manutenção
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('baixas_patrimoniais.index') }}">
                        <i class="bi bi-folder-minus"></i>
                        Baixas Patrimoniais
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('reservas.index') }}">
                        <i class="bi bi-calendar-plus"></i>
                        Reservas
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('emprestimos.index') }}">
                        <i class="bi bi-hand-thumbs-up"></i>
                        Empréstimos
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('devolucoes.index') }}">
                        <i class="bi bi-arrow-return-left"></i>
                        Devoluções
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('comodos.index') }}">
                        <i class="bi bi-house-door"></i>
                        Cômodos
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('setores.index') }}">
                        <i class="bi bi-diagram-2"></i>
                        Setores
                    </a>

                    <a class="nav-link align-itens-left text-left mt-4 mb-4 ms-2 me-2 p-2 itens-menu-lateral" href="{{ route('logout')}}">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair
                    </a>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn modal-buton" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    i {
        font-size: 1.5em;
    }
</style>

<div class="container-fluid">
    <div class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
        </svg> Editar Setor
    </div>

    <div class="ms-5 me-5 mt-1 mb-1 container-conteudo bg-light p-4">
        <div class="row d-flex justify-content-around ">
            <form action="{{ route('setores.update', $Setor->id) }}" method="POST" class="col-12 m-0 p-0 formulario">
                @csrf

                <div class="row m-2">
                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="descricaodosetor" class="m-2 textoAzul3">Descrição do Setor:</label>
                        <input value="{{$Setor->descricaodosetor}}" type="text" id="descricaodosetor" class="w-auto form-control w-sm-auto" name="descricaodosetor" required>
                    </div>
                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="quantidadedecomodos" class="m-2 textoAzul3">Quantidade de cômodos:</label>
                        <input value="{{$Setor->quantidadedecomodos}}" name="quantidadedecomodos" type="number" id="quantidadedecomodos" class="w-auto form-control w-sm-auto" required>
                    </div>
                </div>

                <div class="col-lg-12" style="text-align:right">
                    <button type="submit" class="btn btn-success me-5 mb-5" style="color: #fff;">
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')