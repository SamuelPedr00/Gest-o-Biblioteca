<!-- Modal Adicionar -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAdicionarLabel">Emprestar Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('adicionaEmprestimo') }}" method="POST">
                <div class="modal-body">

                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <h3 class="mb-3">Usuário</h3>
                            <select id="usuario_id" name="usuario_id" class="form-select">
                                @foreach ($listauser as $usuarios)
                                    <option value="{{ $usuarios->id }}">{{ $usuarios->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <h3 class="mb-3">Livro</h3>
                            <select id="livro_id" name="livro_id" class="form-select">
                                @foreach ($lista as $livros)
                                    <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h3 class="mb-3">Dias</h3>
                            <input type="number" id="dias" name="dias" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Emprestar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Receber -->
<div class="modal fade" id="modalReceber" tabindex="-1" aria-labelledby="modalReceberLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalReceberLabel">Receber Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!$listaemprestados->isEmpty())

                <form action="{{ route('recebeEmprestimo') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <h3 class="mb-3">Livro</h3>
                            <select id="livro_id" name="livro_id" class="form-select">
                                @foreach ($listaemprestados as $livros)
                                    <option value="{{ $livros->id }}">{{ $livros->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Receber</button>
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p>Não Existem Livros Emprestados no Sistema</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Receber</button>
                </div>
            @endif
        </div>
    </div>
</div>
