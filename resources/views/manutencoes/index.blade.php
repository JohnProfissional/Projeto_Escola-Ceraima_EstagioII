@extends('layouts.main')

@section('title', 'Manutenções')

@section('cabecalho')
<!--Cabecalho das telas (fora login e cadastro)-->

<div class="d-flex cabecalho2">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-row-reverse" id="menuNavbar">
        <ul class="navbar-nav me-auto ">
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('dashboard') }}">
                Início
                <svg class="bi bi-house m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
            </a>
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('perfil') }}">
                Perfil
                <svg class="bi bi-person-circle m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('login') }}">
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

<!--Conteúdo-->
<div class="container-fluid">
    <a href="" id="categorias" class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        </svg> Manutenções
    </a>

    <div class="ms-5 me-5 mt-1 mb-1 container-conteudo bg-light p-4">
        <div class="row">
            <div class="w-auto d-flex justify-content-center">
            </div>
        </div>

        <div class="row">
            <form action="" class="d-flex justify-content-around w-auto" method="post">
                <select name="selectCampoDeBusca" required="required" class="p-2 m-2 rounded form-control">
                    <option value="nome">Busca por nome</option>
                    <option value="categoria">Busca por categoria</option>
                    <option value="quantidades">Busca por quantidade</option>
                </select>

                <input type="text" class="w-auto m-2 form-control" id="campoDeBusca" placeholder="Pesquise aqui...">
                <input type="submit" class="btn btn-success m-2" value="Buscar">
            </form>
        </div>

        <div class="row m-3">

            <table class="table cabecalho-itens text-center p-2" id="conteudo-itens-lado-direito">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th>Empresa</th>
                        <th>Patrimônio</th>
                        <th>Total da Saída</th>
                        <th>Data Entrada</th>
                        <th>Data Prevista de Entrega</th>
                        <th>Data Saída</th>
                    </tr>
                </thead>

                @foreach ($manutencoes as $manutencao)
                <tbody class="conteudo-itens">
                    <tr>
                        <td scope="row">{{$manutencao->id}}</td>
                        <td>{{$manutencao->empresa}}</td>
                        <td>{{$manutencao->acessarPatrimonio->descricaodopatrimonio}}</td>
                        <td>{{$manutencao->totaldasaidadebens}}</td>                        
                        <td>{{ \Carbon\Carbon::parse($manutencao->dataentrada)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($manutencao->dataprevistadeentrega)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($manutencao->datasaida)->format('d/m/Y') }}</td>

                        @can('access')
                        <td>
                            @if($manutencao->datasaida === null)
                                <div class="col" id="meio">
                                    <form action="{{route('manutencoes.recebido', ['id' => $manutencao->id])}}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-primary" name="formulario" value="Recebido">
                                    </form>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="col" id="meio">
                                <form action="{{route('manutencoes.edit', ['id' => $manutencao->id])}}" method="get">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" name="formulario" value="Alterar">
                                </form>
                            </div>
                        </td>

                        <td>
                            <div class="col" id="meio">
                                <form id="formExcluir" action="{{route('manutencoes.delete', ['id' => $manutencao->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-primary" value="Deletar" onclick="return confirmarExclusao();"><br><br>
                                </form>
                            </div>
                        </td>
                        @endcan
                    </tr>
                </tbody>

                @endforeach
            </table>
        </div>

        @can('access')
        <div class="col-lg-12 me-3" style="text-align:right">
            <form action="{{route('manutencoes.create')}}" method="get">
                @csrf
                <input type="submit" class="btn btn-success" value="Nova">
            </form>
        </div>
        @endcan

    </div>

</div>

<!-- Modal -->
<div class="modal fade modalExcluir" id="excluirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <div class="modal-header"><!--Modal-header-->
                <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
            </div>
            <div class="modal-body"><!--Modal-body-->
                Tem certeza que deseja excluir esse bem?
            </div>
            <div class="modal-footer row"><!--Modal-footer-->
                <div class="col d-flex justify-content-around">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <div class="col d-flex justify-content-around">
                    <button type="button" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmarExclusao() {
        if (confirm("Tem certeza que deseja excluir?")) {
            document.getElementById('formExcluir').submit();
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection('content')