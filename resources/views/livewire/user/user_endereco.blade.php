<form wire:submit.prevent="salvar">
    <div id="edit_profile">
        <div class="p-0">

            <div class="row">
                @if(!$endereco->exists)
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="enderecoCep">CEP</label>

                            <input wire:model.debounce.500ms="endereco.cep" type="tel" id="enderecoCep"
                                   class="form-control" placeholder="CEP" maxlength="8" autocomplete="none">
                        </div>
                    </div>
                @endif

                <div class="col-sm-6" id="municipio">
                    <div class="form-group">
                        <label for="enderecoMunicipio">*Município</label>

                        @if(!$endereco->id)
                            <select wire:model="municipioId" id="enderecoMunicipio"
                                    class="form-control @error('municipioId') is-invalid @enderror">
                                <option value=""></option>

                                @foreach($municipios as $municipio)
                                    <option value="{{$municipio->LOC_NU}}">
                                        {{ $municipio->nome() }} - {{ $municipio->uf() }}
                                    </option>
                                @endforeach
                            </select>

                            @error('municipioId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        @else
                            <input disabled type="text" id="enderecoMunicipio"
                                   class="form-control"
                                   value="{{ $endereco->enderecoAtendido->municipio->nome() }} - {{ $endereco->enderecoAtendido->uf }}">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" id="bairro">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="enderecoBairro">*Bairro</label>

                        @if(!$endereco->id)
                            <select wire:model="endereco.endereco_atendido_id" id="enderecoBairro"
                                    class="form-control @error('endereco.endereco_atendido_id') is-invalid @enderror">
                                <option value=""></option>

                                @foreach($enderecos as $endereco)
                                    <option value="{{$endereco->id}}">
                                        {{ $endereco->bairroNome() }}
                                    </option>
                                @endforeach
                            </select>

                            @error('endereco.endereco_atendido_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        @else
                            <input disabled type="text" id="enderecoMunicipio"
                                   class="form-control"
                                   value="{{ $endereco->enderecoAtendido->bairroNome() }}">
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="endereco">*Endereço</label>

                        <input wire:model.debounce.500ms="endereco.endereco" type="text" id="endereco"
                               class="form-control @error('endereco.endereco') is-invalid @enderror"
                               placeholder="Endereço" autocomplete="none">

                        @error('endereco.endereco')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="enderecoNumero">*Número</label>

                    <input wire:model.debounce.500ms="endereco.numero" type="text" id="enderecoNumero"
                           class="form-control @error('endereco.numero') is-invalid @enderror"
                           placeholder="Número">

                    @error('endereco.numero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="enderecoComplemento">Complemento</label>

                        <input wire:model.debounce.500ms="endereco.complemento" type="text" id="enderecoComplemento"
                               class="form-control @error('endereco.complemento') is-invalid @enderror"
                               placeholder="Complemento">

                        @error('endereco.complemento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block btn-lg">Salvar Alterações</button>
    </div>
</form>
