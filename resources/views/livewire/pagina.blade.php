<form wire:submit.prevent="save">
    <div class="card-body">

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Titulo --->
                <div class="form-group">
                    <label for="titulo">*Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo"
                           wire:model.debounce.500ms="titulo">

                    @error('titulo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <!-- / Titulo -->
            </div>
        </div>

        {{-- Foto lateral da página --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="foto">Foto da página (sobre nós)</label>
                    <input type="file" id="foto" class="form-control"
                           wire:model="foto"
                           accept=".jpg,.jpeg,.png">

                    <small class="text-muted">
                        Dimensão sugerida: 260 x 320px. Formatos: JPG/PNG.
                    </small>

                    @error('foto')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    {{-- preview temporário --}}
                    @if($foto && !$errors->has('foto'))
                        <div class="mt-2">
                            <img src="{{ $foto->temporaryUrl() }}" alt="Preview"
                                 style="max-width:260px;border-radius:20px;object-fit:cover;">
                        </div>
                    @elseif(!empty($pagina->foto))
                        <div class="mt-2">
                            <img src="{{ Storage::disk('storage_configuracoes')->url($pagina->foto) }}"
                                 alt="{{ $titulo }}"
                                 style="max-width:260px;border-radius:20px;object-fit:cover;">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Conteúdo com CKEditor --}}
        <div class="form-group">
            <label for="conteudo">*Conteúdo</label>

            <textarea type="text" class="form-control @error('conteudo') is-invalid @enderror"
                      id="conteudo" wire:model.debounce.500ms="conteudo" hidden></textarea>

            <div wire:ignore>
                <textarea
                    rows="50"
                    x-data
                    x-ref="input"
                    x-init="
                        window.ckeditorHeight = '800px';
                        ckeditor = CKEDITOR.replace($refs.input, {
                            customConfig: '/adminlte/ckeditor-plugins/plugins.js'
                        });
                        ckeditor.on('change', function () {
                            @this.set('conteudo', ckeditor.getData());
                        });
                    "
                    type="text"
                >{!! $conteudo !!}</textarea>
            </div>

            @error('conteudo')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
