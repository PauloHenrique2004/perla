<form wire:submit.prevent="save">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-12">
                <div style="margin: 0 auto; display: block; width: fit-content">
                    <!--- Foto --->
                    <label for="foto" style="width: 380px; margin: 0 auto; display: block;">
                        <img
                            style="width: 380px; height: 200px; cursor: pointer; object-fit: cover; border-radius: 10%;"
                            class="direct-chat-img"
                            src="{{ ($foto && !$errors->has('foto')) ? $this->foto->temporaryUrl() : $slide->fotoUrl() }}"
                            alt="message user image">
                    </label>

                    <input type="file" id="foto" style="visibility: collapse"
                           class="form-control @error('foto') is-invalid @enderror"
                           wire:model="foto">

                    @unless($errors->has('foto'))
                        <div style="text-align: center; border: 1px solid #fff;">
                            <i class="fas fa-info-circle"></i> Tamanho máximo 512KB (JPEG ou PNG)
                        </div>
                        <div style="text-align: center; border: 1px solid #fff;">
                            Resolução ideal 600px x 315px
                        </div>
                    @endunless

                    @error('foto')
                    <div style="text-align: center; color: #a02525;">
                        {{ $message }}
                    </div>
                @enderror
                <!-- / Foto -->
                </div>
            </div>
        </div>

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

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Ordem --->
                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input type="number" class="form-control @error('ordem') is-invalid @enderror" id="ordem"
                           wire:model.debounce.500ms="ordem">

                    @error('ordem')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <!-- / Ordem -->
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="promocional">*Promocional?</label>

                    <div class="ml-3 form-check-inline">
                        <input class="form-check-input" type="radio" name="promocional" id="promocional" value="1"
                               wire:model.debounce.500ms="promocional" required>
                        <label class="form-check-label" for="promocional">Sim</label>

                        <input class="form-check-input ml-2" type="radio" name="promocional" id="nao-promocional" value="0"
                               wire:model.debounce.500ms="promocional" required>
                        <label class="form-check-label" for="nao-promocional">Não</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Link --->
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" required
                           wire:model.debounce.500ms="link">

                    @error('link')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <!-- / Link -->
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.slides.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
