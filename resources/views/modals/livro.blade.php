<!-- Modal Adicionar -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAdicionarLabel">Adicionar Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('adicionaLivro') }}" method="POST">
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" id="autor" name="autor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sinopse">Sinopse:</label>
                        <textarea id="sinopse" name="sinopse" class="form-control" rows="5" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Excluir -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalExcluirLabel">Excluir Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('desativaLivro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="livro" name="livro" class="form-select">
                            @foreach ($lista as $livros)
                                <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não Existem Livros Ativos no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Ativar -->
<div class="modal fade" id="modalAtivar" tabindex="-1" aria-labelledby="modalAtivarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAtivarLabel">Ativar Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$listadesativados->isEmpty())
                <form action="{{ route('ativaLivro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Livros Desativados</p>
                        <select id="livro" name="livro" class="form-select">
                            @foreach ($listadesativados as $livros)
                                <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Ativar</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não Existem Livros Desativados no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Ativar</button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarLabel">Editar Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('editaLivro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="livro" name="livro" class="form-select">
                            @foreach ($lista as $livros)
                                <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="nome">Novo Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="autor">Novo Autor:</label>
                            <input type="autor" id="autor" name="autor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sinopse">Nova Sinopse:</label>
                            <textarea id="sinopse" name="sinopse" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não Existem Generos Ativos no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Adicionar Genero -->
<div class="modal fade" id="modalAdicionarGenero" tabindex="-1" aria-labelledby="modalAdicionarGeneroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAdicionarGeneroLabel">Adicionar Genero Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty() and !$listagenero->isEmpty())
                <form action="{{ route('adicionaGeneroLivro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Livros</p>
                        <select id="livro_id" name="livro_id" class="form-select">
                            @foreach ($lista as $livros)
                                <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                            @endforeach
                        </select>
                        <p>Generos</p>
                        <select id="genero_id" name="genero_id" class="form-select">
                            @foreach ($listagenero as $generos)
                                <option value="{{ $generos->id }}">{{ $generos->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar Genero</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não existem Livros ou Generos suficientes no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Genero</button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Remover Genero -->
<div class="modal fade" id="modalRemoveGenero" tabindex="-1" aria-labelledby="modalRemoveGenero" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalRemoveGenero">Remove Genero do Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty() and !$listagenero->isEmpty())
                <form action="{{ route('removeGeneroLivro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Livros</p>
                        <select id="livro_id" name="livro_id" class="form-select">
                            @foreach ($lista as $livros)
                                <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                            @endforeach
                        </select>
                        <p>Generos</p>
                        <select id="genero_id" name="genero_id" class="form-select">
                            @foreach ($listagenero as $generos)
                                <option value="{{ $generos->id }}">{{ $generos->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Remove Genero do Livro</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não existem Livros ou Generos suficientes no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remove Genero do Livro</button>
                </div>
            @endif
        </div>
    </div>
</div>