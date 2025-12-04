<form wire:submit.prevent="salvar">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('formaPagamento.nome') is-invalid @enderror"
                           id="nome" wire:model.debounce.500ms="formaPagamento.nome">

                    @error('formaPagamento.nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.forma_pagamentos.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
