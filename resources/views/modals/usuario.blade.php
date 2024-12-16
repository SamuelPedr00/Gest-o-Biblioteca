 <!-- Modal Adicionar -->
 <div class="modal fade" id="modalAdicionar" tabindex="-1" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAdicionarLabel">Adicionar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('adicionaUsuario') }}" method="POST">
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
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
                <h1 class="modal-title fs-5" id="modalExcluirLabel">Excluir Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('desativaUsuario') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="usuario" name="usuario" class="form-select">
                            @foreach ($lista as $usuarios)
                                <option value="{{ $usuarios->id }}">{{ $usuarios->nome }}</option>
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
                    <p>Não Existem Usuarios Ativos no Sistema</p>
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
                <h1 class="modal-title fs-5" id="modalAtivarLabel">Ativar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$listadesativados->isEmpty())
                <form action="{{ route('ativaUsuario') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Usuarios Desativados</p>
                        <select id="usuario" name="usuario" class="form-select">
                            @foreach ($listadesativados as $usuarios)
                                <option value="{{ $usuarios->id }}">{{ $usuarios->nome }}</option>
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
                    <p>Não Existem Usuarios Desativados no Sistema</p>
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
                <h1 class="modal-title fs-5" id="modalEditarLabel">Editar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$lista->isEmpty())

                <form action="{{ route('editaUsuario') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <select id="usuario" name="usuario" class="form-select">
                            @foreach ($lista as $usuarios)
                                <option value="{{ $usuarios->id }}">{{ $usuarios->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="nome">Novo Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Novo Email:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não Existem Usuarios Ativos no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            @endif

        </div>
    </div>
</div>