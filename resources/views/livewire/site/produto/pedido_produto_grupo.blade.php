<section>
    <div class="grupo-header">
        <span class="grupo-header-wrapper">
            <p class="grupo-header-name">
                {{ $carga['produtoGrupo']['nome'] }}

                <span class="grupo-header-description">
                @if($carga['produtoGrupo']['tipo'] == 1)
                        @if($carga['produtoGrupo']['quantidade_minima'] > 0)
                            Mínimo {{ $carga['produtoGrupo']['quantidade_minima'] }} até {{ $carga['produtoGrupo']['quantidade_maxima'] }}
                        @else
                            Escolha até {{ $carga['produtoGrupo']['quantidade_maxima'] }}
                        @endif

                        {{ $carga['produtoGrupo']['quantidade_maxima'] > 1 ? 'opções' : 'opção' }}.
                    @else
                        Escolha {{ $carga['produtoGrupo']['quantidade_minima'] }}
                        {{ $carga['produtoGrupo']['quantidade_minima'] > 1 ? 'opções' : 'opção' }}.
                    @endif
                 </span>
            </p>

            @if($carga['valido'] || $carga['produtoGrupo']['tipo'] == 1)
                <span class="grupo-valido">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path fill-rule="evenodd"
                              d="M2.59 6.57A1 1 0 0 0 1.19 8l5.16 5.09L16.72 2.36A1 1 0 1 0 15.28.97l-8.96 9.28-3.73-3.68z"
                              clip-rule="evenodd"></path>
                    </svg>
                </span>
            @else
                <div>
                    @if($carga['produtoGrupo']['quantidade_maxima'] > 1)
                        <span class="grupo-required">
                            <span
                                class="grupo-required-name">{{ $quantidadeUtilizada }}/{{ $carga['produtoGrupo']['quantidade_maxima'] }}</span>
                         </span>
                    @endif

                    <span class="grupo-required">
                        <span class="grupo-required-name">OBRIGATÓRIO</span>
                    </span>
                </div>
            @endif
        </span>
    </div>

    @foreach($carga['pedidoProdutoGrupoComplementos'] as $index => $complemento)
        @include('livewire.site.produto._pedido_produto_grupo_complemento', compact('index', 'complemento'))
    @endforeach

</section>
