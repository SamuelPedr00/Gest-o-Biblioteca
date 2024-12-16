@extends('templates.basico')

@section('css', 'index.css')

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <h4>Erro(s) encontrado(s):</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session('sucesso'))
        <div class="alert alert-success mt-4">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="container d-flex justify-content-center my-4">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Emprestar Livro</h5>
                        <p class="card-text">Empreste Livro no Sistema</p>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalAdicionar">
                            Emprestar
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Receber Livro</h5>
                        <p class="card-text">Receber livros do Sistema</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalReceber">
                            Receber
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center my-4">Lista de Empréstimos</h1>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table">
                <tr>
                    <th>Nome do Livro</th>
                    <th>Prazo de Entrega</th>
                    <th>Responsável</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->livro->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($emprestimo->dataPrazo)->format('d/m/Y') }}</td>
                        <td>{{ $emprestimo->usuario->nome }}</td>
                        <td>
                            @if (\Carbon\Carbon::now()->greaterThan(\Carbon\Carbon::parse($emprestimo->dataPrazo)))
                                Atrasado
                            @else
                                Dentro do Prazo
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$emprestimos->links()}}
    </div>

    @include('modals.emprestimo')
@endsection
