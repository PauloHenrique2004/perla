@section('title', 'Formulário Endereço Atendido - ')
@section('header-title', 'Formulário Endereço Atendido')

<form wire:submit.prevent="salvar">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="uf">*Município</label>
                    <select class="custom-select @error('enderecoAtendido.municipio_id') is-invalid @enderror" id="uf" wire:model="enderecoAtendido.municipio_id" required>
                        <option></option>
                        @foreach($municipios as $municipio)
                            <option value="{{$municipio->id}}">
                                {{ $municipio->uf }} - {{ $municipio->nome }}
                            </option>
                        @endforeach
                    </select>

                    @error('enderecoAtendido.municipio_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nome">*Bairro</label>
                    <input type="text" class="form-control @error('enderecoAtendido.bairro') is-invalid @enderror"
                           id="nome" wire:model.debounce.500ms="enderecoAtendido.bairro">

                    @error('enderecoAtendido.bairro')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <x-jquery-mask-money wire-model="enderecoAtendido.valor_entrega" id="valor_entrega" label="Valor" value="{{ $enderecoAtendido->valor_entrega }}" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ativo"
                               id="ativo" value="1" wire:model="enderecoAtendido.ativo">
                        <label class="form-check-label" for="ativo">
                            Ativo
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="inativo"
                               id="inativo" value="0" wire:model="enderecoAtendido.ativo">
                        <label class="form-check-label" for="inativo">
                            Inativo
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.endereco.enderecos_atendidos.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
