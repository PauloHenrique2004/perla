<div class="col-lg-4">
    <div class="sticky_sidebar">
        <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
            <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                <div class="d-flex flex-column">
                    <h6 class="mb-1 font-weight-bold">Endereço de Entrega</h6>
                    <p class="mb-0 small text-muted">
                        @if($formaEntrega && $pedido->forma_entrega_id)
                            {{ $formaEntrega->nome }}
                            @if($usuarioEndereco && $formaEntrega->informar_endereco)
                                <br>{{ $usuarioEndereco->endereco }}, {{ $usuarioEndereco->numero }},
                                {{ $usuarioEndereco->enderecoAtendido->bairroNome() }},
                                {{ $usuarioEndereco->enderecoAtendido->municipio->nome() }} -
                                {{ $usuarioEndereco->enderecoAtendido->uf }}
                            @endif
                        @else
                            Escolha a forma de entrega
                        @endif
                    </p>
                </div>
            </div>
            <div>
                <div class="bg-white p-3 clearfix">
                    <p class="font-weight-bold small mb-2">
                        Detalhes
                    </p>

                    <p class="mb-1">
                        Total itens <span class="small text-muted">
                            ({{ $quantidade }} {{ $quantidade == 1 ? 'item' : 'itens' }})
                        </span>
                        <span
                            class="float-right text-dark">R$ {{ number_format($produtosSubTotal, 2, ',', '.') }}</span>
                    </p>

                    <p class="mb-3">
                        Valor Entrega
                        <span class="float-right text-success">
                            R$
                            {{ $pedido->valor_entrega && $pedido->valor_entrega > 0 ? number_format($pedido->valor_entrega, 2, ',', '.') : '0,00' }}
                        </span>
                    </p>

                    <h6 class="mb-0 text-success">
                        Desconto
                        <span class="float-right text-success">
                            R$
                            {{ $pedido->valor_desconto && $pedido->valor_desconto > 0 ? number_format($pedido->valor_desconto, 2, ',', '.') : '0,00' }}
                        </span>
                    </h6>
                </div>

                <div class="p-3 border-top">
                    <h5 class="mb-0">
                        Total <span class="float-right text-danger">R$ {{ number_format($total, 2, ',', '.') }}</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
