<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <div class="card-body">
        <div class="row">

            {{-- Nome da seção --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome da seção</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="{{ old('nome', $destaque->nome) }}">
                    <small class="form-text text-muted">
                        Ex.: Mais vendidos, Queridinhos, Destaques da semana.
                    </small>
                </div>
            </div>

            {{-- Ordem --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input type="number" class="form-control" id="ordem" name="ordem"
                           value="{{ old('ordem', $destaque->ordem) }}">
                    <small class="form-text text-muted">
                        Define a posição da seção na home (1 aparece primeiro).
                    </small>
                </div>
            </div>

            {{-- Ativo --}}
            <div class="col-sm-3 d-flex align-items-center">
                <div class="form-group mb-0">
                    <label for="ativo" class="mr-2">Ativo</label><br>
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                        {{ old('ativo', $destaque->ativo ?? true) ? 'checked' : '' }}>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
