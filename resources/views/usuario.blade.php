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
                        <h5 class="card-title">Adicionar Usuario</h5>
                        <p class="card-text">Adicione Usuario no Sistema</p>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Excluir Usuario</h5>
                        <p class="card-text">Exclua Usuario do Sistema</p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ativar Usuario</h5>
                        <p class="card-text">Ativar Usuario do Sistema</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtivar">
                            Ativar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Usuario</h5>
                        <p class="card-text">Editar Usuario do Sistema</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar">
                            Editar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.usuario')

   
@endsection
