<div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
    <div class="endereco @if($pedido->cliente_endereco_id == $endereco->id) endereco-selecionado @endif">
        <div class="p-3 bg-white rounded shadow-sm w-100">
            <div wire:click="alterarClienteEnderecoId({{ $endereco->id }})">
                <div class="d-flex align-items-center mb-2">
                    <p class="mb-0 h6">{{ $endereco->endereco }}, {{ $endereco->numero }}</p>
                    <p class="mb-0 badge badge-success ml-auto">
                        R$ {{ number_format($endereco->enderecoAtendido->valor, 2, ',', '.') }}
                    </p>
                </div>

                <p class="small text-muted m-0">
                    {{ $endereco->complemento }}
                </p>
                <p class="small text-muted m-0">
                    {{ $endereco->enderecoAtendido->bairroNome() }},
                    {{ $endereco->enderecoAtendido->municipio->nome() }} -
                    {{ $endereco->enderecoAtendido->uf }}
                </p>
            </div>

            <p class="pt-2 m-0 text-right">
                    <span class="small">
                        <a href="" wire:click.prevent="editarEndereco({{ $endereco->id }})"
{{--                           data-toggle="modal"--}}
{{--                           data-target="#exampleModal"--}}
                           class="text-decoration-none text-info">
                            Editar
                        </a>
                    </span>
            </p>
        </div>
    </div>
</div>
