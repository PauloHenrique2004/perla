<form wire:submit.prevent="salvar">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                           wire:model.debounce.500ms="nome">

                    @error('nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">*E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           wire:model.debounce.500ms="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha"
                           wire:model.debounce.500ms="senha">

                    @error('senha')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
