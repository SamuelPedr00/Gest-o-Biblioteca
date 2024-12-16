@extends('templates.basico')

@section('css', 'index.css')

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Erro(s) encontrado(s):</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('aviso'))
    <div class="alert alert-warning">
        {{ session('aviso') }}
    </div>
@endif


@if (session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

<div class="container d-flex justify-content-center my-4">
    <div class="row">
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Adicionar Livro</h5>
                    <p class="card-text">Adicione Livro no Sistema</p>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Excluir Livro</h5>
                    <p class="card-text">Exclua Livro do Sistema</p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ativar Livro</h5>
                    <p class="card-text">Ativar Livro do Sistema</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtivar">
                        Ativar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Editar Livro</h5>
                    <p class="card-text">Edite livros do Sistema</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar">
                        Editar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Adicionar generos ao Livro</h5>
                    <p class="card-text">Adicione generos ao Livro</p>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionarGenero">
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Remover generos ao Livro</h5>
                    <p class="card-text">Remover generos ao Livro</p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalRemoveGenero">
                        Remover
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.livro')


@endsection
