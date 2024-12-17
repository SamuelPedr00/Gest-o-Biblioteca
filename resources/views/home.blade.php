@extends('templates.basico')

@section('css', 'index.css')

@section('conteudo')
    <div class="container my-4">
        <!-- Filtro de Gênero -->
        @if (!$listagenero->isEmpty())
            <form method="GET" action="{{ route('index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <select name="genero" class="form-control">
                            <option value="">Todos os Gênero</option>

                            @foreach ($listagenero as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
        @endif
        <div class="row">
            @if (!$lista->isEmpty())
                @foreach ($lista as $livros)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $livros->nome }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $livros->autor }}</h6>
                                <p class="card-text">{{ $livros->sinopse }}</p>
                                @if ($livros->statusEmprestimo == 1)
                                    <button class="btn btn-danger">Emprestado</button>
                                @else
                                    <button class="btn btn-primary">Disponível</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Nenhum livro disponível.</p>
            @endif
        </div>
    </div>
@endsection
