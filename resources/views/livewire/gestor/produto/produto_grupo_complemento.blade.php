<div class="col-md-12 mt-2 mt-2">
    <div class="color-palette-set">

        <div style="display: flex; width: 100%">
            <div wire:click.confirm.prevent="salvar" class="bg-green color-palette"
                 style="border-radius: 5px 0 0 0; cursor: pointer; width: 70%">
                <div style="width: fit-content; margin: 0 auto;">
                    <i class="nav-icon fas fa-save"></i> Salvar
                </div>
            </div>

            <div wire:click.confirm.prevent="remover" class="bg-danger color-palette"
                 style="border-radius: 0 5px 0 0; cursor: pointer; width: 30%">
                <div style="width: fit-content; margin: 0 auto;">
                    <i class="nav-icon fas fa-trash"></i> Remover
                </div>
            </div>
        </div>


        <div class="color-palette"
             style="background-color: white !important; border: 1px solid #6c757d; border-radius: 0 0 5px 5px; padding: 5px">


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nome">*Nome</label>
                        <input type="text" class="form-control @error('complemento.nome') is-invalid @enderror" id="nome"
                               wire:model.debounce.500ms="complemento.nome">

                        @error('complemento.nome')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <x-jquery-mask-money wire-model="complemento.preco" id="preco" label="Preço"
                                             value="{{ $complemento->preco }}"/>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control @error('complemento.descricao') is-invalid @enderror" id="descricao"
                               wire:model.debounce.500ms="complemento.descricao">

                        @error('complemento.descricao')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
