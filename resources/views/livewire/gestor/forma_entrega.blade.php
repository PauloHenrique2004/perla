<form wire:submit.prevent="salvar">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('formaEntrega.nome') is-invalid @enderror"
                           id="nome" wire:model.debounce.500ms="formaEntrega.nome">

                    @error('formaEntrega.nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="informar-endereco-entrega"
                               id="informar-endereco" value="1"
                               wire:model.debounce.500ms="formaEntrega.informar_endereco">
                        <label class="form-check-label" for="informar-endereco">Endereço pra Entrega:
                            <b>Informar</b></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="informar-endereco-entrega"
                               id="nao-informar-endereco" value="0"
                               wire:model.debounce.500ms="formaEntrega.informar_endereco">
                        <label class="form-check-label" for="nao-informar-endereco">Endereço pra Entrega: <b>Não
                                Informar</b></label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.forma_entregas.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
