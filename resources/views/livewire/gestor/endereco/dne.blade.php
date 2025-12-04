<div>
    <div class="card-body">
        <div style="margin-bottom: 1em; display: flex">

            <button wire:click.prevent="voltar()" @if(sizeof($tipoVisualizacaoHistorico) == 0) disabled
                    @endif class="btn btn-sm btn-primary" style="width: 100px; margin-right: 5px">
                <i class="fas fa-arrow-circle-left"></i> Voltar
            </button>

            <input wire:model="query" placeholder="Pesquisa" class="form-control" type="text">
        </div>

        @if($tipoVisualizacao == 'bairro')
            <div style="margin: 0 auto; display: flex; width: fit-content; margin-bottom: 1em;">
                <input id="bairroNome" wire:model.debounce.500ms="bairroCustom" placeholder="Nome do bairro"
                       style="max-width: 190px"
                       class="form-control" type="text">
                <button wire:click.prevent="cadastrarBairroCustom()" class="btn btn-sm btn-primary"
                        style="width: 150px; margin-left: 5px;">
                    <i class="fas fa-save"></i> Cadastrar
                </button>
            </div>
        @endif

        @if($tipoVisualizacao == 'uf')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 35px"></th>
                        <th>UF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faixaUfs as $uf)
                        <tr>
                            <td>
                                <button wire:click.prevent="alterarTipoMunicipios('{{ $uf->UFE_SG }}')"
                                        class="btn btn-sm btn-primary">
                                    <i class="fas fa-folder-open" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                            <span
                                class="badge @if($uf->enderecosAtendidos->count() == 0) badge-secondary @else badge-primary @endif right">{{ $uf->enderecosAtendidos->count() }}</span>
                                {{ $uf->UFE_SG }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($tipoVisualizacao == 'municipio')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 35px"></th>
                        <th>Município</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($municipios as $municipio)
                        <tr>
                            <td>
                                <button wire:click.prevent="alterarTipoBairros({{ $municipio->LOC_NU }})"
                                        class="btn btn-sm btn-primary">
                                    <i class="fas fa-folder-open" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                            <span
                                class="badge @if($municipio->enderecosAtendidos->count() == 0) badge-secondary @else badge-primary @endif right">{{ $municipio->enderecosAtendidos->count() }}</span>
                                {{ $municipio->LOC_NO }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($tipoVisualizacao == 'bairro')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Bairro</th>
                        <th style="width: 220px;">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Customizados -->
                    @if($bairros->currentPage() == 1)
                        @foreach($bairrosEnderecoAtendidos as $bairro)
                            <tr>
                                <td>{{ $bairro->bairro_custom }}</td>
                                <td>
                                    <livewire:gestor.endereco.dne-endereco-atendido :uf="$ufeSg" :locNu="$locNu"
                                                                                    :enderecoAtendidoId="$bairro->id"
                                                                                    :index="$bairro->uuid()"
                                                                                    :key="$bairro->uuid()"/>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    @foreach($bairros as $bairro)
                        <tr>
                            <td>{{ $bairro->BAI_NO }}</td>
                            <td>
                                <livewire:gestor.endereco.dne-endereco-atendido :uf="$ufeSg" :locNu="$locNu"
                                                                                :baiNu="$bairro->BAI_NU"
                                                                                :index="$bairro->uuid()"
                                                                                :key="$bairro->uuid()"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div class="card-footer clearfix">
        @if($tipoVisualizacao == 'municipio')
            {{ $municipios->links() }}
        @elseif($tipoVisualizacao == 'bairro')
            {{ $bairros->links() }}
        @endif
    </div>
</div>
