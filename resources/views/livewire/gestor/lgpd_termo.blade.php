<form wire:submit.prevent="salvar">
    <div class="card-body">
        <div class="form-group">
            @if($lgpdTermo->id)
                {!! $lgpdTermo->texto !!}
            @else
                <label for="descricao">*Texto</label>

                <textarea type="text" class="form-control @error('lgpdTermo.texto') is-invalid @enderror"
                          id="lgpdTermo.texto" wire:model.debounce.500ms="lgpdTermo.texto" hidden></textarea>

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
                                ckeditor.on('change', function(event, data) {
                                    @this.set('lgpdTermo.texto', ckeditor.getData());
                                });
                            "
                    type="text"
                >{{ $lgpdTermo->texto }}</textarea>
                </div>

                @error('lgpdTermo.texto')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            @endif
        </div>

    </div>

    @unless($lgpdTermo->id)
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    @endunless
</form>