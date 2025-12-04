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
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="uf">*Localidade</label>
                        <select class="custom-select @error('endereco.endereco_atendido_id') is-invalid @enderror" id="uf" wire:model="endereco.endereco_atendido_id" required>
                            <option></option>
                            @foreach($enderecosAtendidos as $endereco)
                                <option value="{{$endereco->id}}">
                                    {{ $endereco->uf }} - {{ $endereco->municipio->nome() }} - {{ $endereco->bairroNome() }}
                                </option>
                            @endforeach
                        </select>

                        @error('endereco.endereco_atendido_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="endereco">*Endereço</label>
                        <input type="text" class="form-control @error('endereco.endereco') is-invalid @enderror"
                               id="endereco" wire:model.debounce.500ms="endereco.endereco">

                        @error('endereco.endereco')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="numero">*Número</label>
                        <input type="text" class="form-control @error('endereco.numero') is-invalid @enderror"
                               id="numero" wire:model.debounce.500ms="endereco.numero">

                        @error('endereco.numero')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control @error('endereco.complemento') is-invalid @enderror"
                               id="complemento" wire:model.debounce.500ms="endereco.complemento">

                        @error('endereco.complemento')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
