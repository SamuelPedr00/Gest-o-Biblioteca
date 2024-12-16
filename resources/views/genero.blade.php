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
                    <h5 class="card-title">Adicionar Generos</h5>
                    <p class="card-text">Adicione Genero no Sistema</p>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Excluir Generos</h5>
                    <p class="card-text">Exclua Genero do Sistema</p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ativar Generos</h5>
                    <p class="card-text">Ativar Generos do Sistema</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtivar">
                        Ativar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Editar Genero</h5>
                    <p class="card-text">Edite Generos do Sistema</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar">
                        Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.genero')

@endsection