<form wire:submit.prevent="save">
    <div class="card-body">
        <!--- Categoria --->
{{--        <div class="row mb-4">--}}
{{--            <div class="col-md-12">--}}
{{--                <!-- select -->--}}
{{--                <div class="form-group">--}}
{{--                    <label>*Categoria</label>--}}
{{--                    <select class="custom-select @error('categoriaId') is-invalid @enderror" wire:model="categoriaId">--}}
{{--                        <option value=""></option>--}}
{{--                        @foreach($categorias as $categoria)--}}
{{--                            <optgroup label="{{ $categoria->nome }}">--}}
{{--                                @foreach($categoria->subCategorias as $subCategoria)--}}
{{--                                    <option value="{{$subCategoria->id}}"--}}
{{--                                            @if(request()->query('categoria_id') == $categoria->id) selected @endif>--}}
{{--                                        {{ $subCategoria->nome }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </optgroup>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                    @error('categoriaId')--}}
{{--                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- / Categoria -->

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

        <div class="form-group">
            <label for="descricao">*Conteúdo</label>

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
                                ckeditor.on('change', function(event, data) {
                                    @this.set('conteudo', ckeditor.getData());
                                });
                            "
                    type="text"
                >{{ $conteudo }}</textarea>
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
