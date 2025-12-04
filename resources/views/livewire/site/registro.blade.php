@section('title', 'Cadastro - ')
@section('header-title', 'Formulário de cadastro')

<form wire:submit.prevent="salvar">
    <div class="row">
        <div class="col-lg-5 mb-4 mb-md-0 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h5 class="mb-4 profile-title">1) Dados Básicos</h5>

            <div id="edit_profile">
                <div class="p-0">
                    <div class="form-group mb-3">
                        <label for="aaaa">*Nome</label>

                        <input wire:model.debounce.500ms="usuario.name" type="text" name="barrr" id="aaaa"
                               autofocus class="form-control @error('usuario.name') is-invalid @enderror"
                               placeholder="*Meu Nome" autocomplete="none">

                        @error('usuario.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="userEmail">*E-mail</label>

                        <input wire:model.debounce.500ms="usuario.email" type="email" id="userEmail"
                               class="form-control @error('usuario.email') is-invalid @enderror"
                               placeholder="*E-mail">

                        @error('usuario.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="senha">*Senha</label>

                        <input wire:model.debounce.500ms="senha" type="password" id="senha"
                               class="form-control @error('senha') is-invalid @enderror"
                               placeholder="*Senha">

                        @error('senha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmacaoSenha">*Confirmação de Senha</label>

                        <input wire:model.debounce.500ms="senha_confirmation" type="password"
                               id="confirmacaoSenha"
                               class="form-control @error('senha_confirmation') is-invalid @enderror"
                               placeholder="*Confirmação de Senha">

                        @error('senha_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="usuarioTelefone">*Telefone</label>

                        <input wire:model.debounce.500ms="usuario.telefone" type="text"
                               id="usuarioTelefone"
                               class="form-control @error('usuario.telefone') is-invalid @enderror"
                               placeholder="*Telefones">

                        @error('usuario.telefone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 ml-md-2 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
            <h5 class="mb-4 profile-title">2) Endereço</h5>
            <a style="float: right; width: 100%; text-align: right;" href="#" data-toggle="modal"
               data-target="#enderecoNaoLocalizado">
                Não localizei meu endereço
            </a>

            <div id="edit_profile">
                <div class="p-0">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="enderecoCep">CEP</label>

                                <input wire:model.debounce.500ms="endereco.cep" type="tel" id="enderecoCep"
                                       class="form-control" placeholder="CEP" maxlength="8" autocomplete="none">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="enderecoMunicipio">*Município</label>

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
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="enderecoBairro">*Bairro</label>

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
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6" style="margin: 0 auto">
            <button type="submit" class="btn btn-success btn-block">CADASTRAR</button>
        </div>
    </div>

    {{-- Modal endereço não localizado--}}
    <div class="modal" id="enderecoNaoLocalizado" tabindex="-1" role="dialog" aria-labelledby="enderecoNaoLocalizado"
         style="background: rgba(117, 117, 117, 0.81); z-index: 9999; padding-right: 4px;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div
                        style="font-size: 14px; text-transform: uppercase; font-weight: bold; color: #000; text-align: center">
                        Prezado cliente, caso não tenha encontrado seu endereço é porque nesse momento ainda não
                        entregamos na sua região, mas ainda assim, você pode fazer seu pedido e retirar no local.
                    </div>
                </div>

                <div class="modal-footer p-0 border-0">
                    <div class="col-12 m-0 p-0">
                        <button type="button" id="close" class="btn border-top btn-lg btn-block" data-dismiss="modal"
                                style="color: #fff; background: var(--site-cor)">CONTINUAR
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal endereço não localizado--}}
</form>
