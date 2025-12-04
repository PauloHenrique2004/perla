<form wire:submit.prevent="save">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-12">
                <div style="margin: 0 auto; display: block; width: fit-content">
                    <!--- Icone --->
                    <label for="icone" style="width: fit-content; margin: 0 auto; display: block;">
                        <img
                            style="width: 120px; height: 93px; cursor: pointer; object-fit: cover; border-radius: 10%;"
                            class="direct-chat-img"
                            src="{{ ($icone && !$errors->has('icone')) ? $this->icone->temporaryUrl() : $categoria->iconeUrl() }}"
                            alt="Ícone categoria">
                    </label>

                    <input type="file" id="icone" style="visibility: collapse"
                           class="form-control @error('icone') is-invalid @enderror"
                           wire:model="icone">

                    @unless($errors->has('icone'))
                        <div style="text-align: center; border: 1px solid #fff;">
                            <i class="fas fa-info-circle"></i> Tamanho máximo 512KB (JPEG ou PNG)
                        </div>
                        <div style="text-align: center; border: 1px solid #fff;">
                            Resolução requerida 330 x 228px
                        </div>
                    @endunless

                    @error('icone')
                    <div style="text-align: center; color: #a02525;">
                        {{ $message }}
                    </div>
                @enderror
                <!-- / Icone -->
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Nome --->
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                           wire:model.debounce.500ms="nome">

                    @error('nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <!-- / Nome -->
            </div>
        </div>

        <hr class="mb-3">

        {{-- Vínculo com o menu fixo --}}
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu_grupo">Mostrar no menu em</label>
                    <select id="menu_grupo" class="form-control" wire:model="menu_grupo">
                        <option value="">— Não mostrar no menu —</option>
                        <option value="kits">Kits</option>
                        <option value="linhas">Linhas</option>
                        <option value="produtos">Produtos</option>
                        <option value="cabelos">Tipos de cabelo</option>
                    </select>
                    <small class="form-text text-muted">
                        Opcional: use este campo apenas se quiser que a categoria apareça no menu.
                        O nome da categoria será usado como submenu.
                    </small>

                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.produto_categorias.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
