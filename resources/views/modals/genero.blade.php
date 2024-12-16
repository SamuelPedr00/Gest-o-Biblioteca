<!-- Modal Adicionar -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAdicionarLabel">Adicionar Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('adicionaGenero') }}" method="POST">
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
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
                <h1 class="modal-title fs-5" id="modalExcluirLabel">Excluir Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('desativaGenero') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="genero" name="genero" class="form-select">
                            @foreach ($lista as $generos)
                                <option value="{{ $generos->id }}">{{ $generos->nome }}</option>
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
                    <p>Não Existem Genero Ativos no Sistema</p>
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
                <h1 class="modal-title fs-5" id="modalAtivarLabel">Ativar Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$listadesativados->isEmpty())
                <form action="{{ route('ativaGenero') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Genero Desativados</p>
                        <select id="genero" name="genero" class="form-select">
                            @foreach ($listadesativados as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
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
                    <p>Não Existem Generos Desativados no Sistema</p>
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
                <h1 class="modal-title fs-5" id="modalEditarLabel">Editar Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('editaGenero') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="genero" name="genero" class="form-select">
                            @foreach ($lista as $generos)
                                <option value="{{ $generos->id }}">{{ $generos->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="nome">Novo Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control">
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
