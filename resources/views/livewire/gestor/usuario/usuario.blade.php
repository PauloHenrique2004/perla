@section('title', 'Formulário Cliente - ')

<form wire:submit.prevent="salvar" id="usuario-form">
    <div class="card-header">
        <h1 class="card-title">Formulário Cliente</h1>

        <div class="card-tools">
            <div class="float-right">
                <a href="{{ route('gestor.usuarios.index') }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-success">
                    <i class="nav-icon fas fa-save"></i> Salvar Usuário
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                           wire:model.debounce.500ms="nome">

                    @error('nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                           wire:model.debounce.500ms="telefone">

                    @error('telefone')
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

    <div class="card-body">
        <!--- Endereços --->

        <div style="border: 1px solid #8a8a8a; padding: 5px; border-radius: 5px;">
            <div class="row">
                <div class="col-md-12">
                    <div style="float: left">
                        <h5 class="animate__animated animate__lightSpeedInRight"
                            style="font-family: 'Sacramento', cursive; font-size: 2rem; padding-top: 5px; padding-left: 5px; color: #747c84;">
                            Endereços
                        </h5>
                    </div>

                    @if($usuario->id)
                        <div style="float: right">
                            <button wire:click.prevent="addEndereco" class="btn btn-success mb-4">
                                <i class="nav-icon fas fa-plus"></i> Adicionar Enderecço
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @if($usuario->id)
                        @foreach($enderecos as $key => $endereco)
                            <livewire:gestor.usuario.endereco :endereco="$endereco" :index="$key"
                                                              :key="'endereco'.$key">
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Necessário realizar o cadastro do usuário.</h3>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- / Endereços -->
    </div>
</form>
