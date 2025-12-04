<div class="cart-items bg-white position-relative border-bottom">
    <div class="d-flex  align-items-center p-3">
        <a href="{{ route('produtos.show', [$pedidoProduto->produto->slug, $pedidoProduto->produto]) }}">
            <img src="{{ asset($pedidoProduto->produto->fotoUrl()) }}" alt="{{ $pedidoProduto->produto->nome }}"
                 class="img-fluid">
        </a>

        <a href="{{ route('produtos.show', [$pedidoProduto->produto->slug, $pedidoProduto->produto]) }}"
           class="ml-3 text-dark text-decoration-none w-100">

            <h6 class="mb-1" style="font-size: 14px">{{ $pedidoProduto->nome }}</h6>

            @if($pedidoProduto->total != $pedidoProduto->preco)
                <p class="text-muted mb-2">
                    R$ {{ number_format($pedidoProduto->preco, 2, ',', '.') }}
                </p>
            @endif

            <div class="d-flex align-items-center">
                <p class="total_price font-weight-bold m-0">
                    R$ {{ number_format($pedidoProduto->total, 2, ',', '.') }}
                </p>
            </div>
        </a>

        <!----------- Item opções/ações desktop ----------->
        <div class="cart-items-number d-flex ml-auto item-opcoes-desktop">
            <input wire:click.prevent="alterarQuantidade({{ $pedidoProduto->id }}, 'remover')" type='button'
                   value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>

            <div class='qty form-control' style="margin-top: 6px">
                {{ $pedidoProduto->quantidade }}
            </div>

            <input wire:click.prevent="alterarQuantidade({{ $pedidoProduto->id }}, 'adicionar')" type='button'
                   value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
        </div>

        <div wire:click="removerPedidoProduto({{ $pedidoProduto->id }})" class="d-flex ml-auto item-opcoes-desktop"
             style="font-size: 20px; color: #797979; padding-left: 7px">
            <i class="icofont-trash"></i>
        </div>
        <!----------- / Item opções/ações desktop ----------->
    </div>

    <!----------- Item opções/ações mobile ----------->
    <div class="d-flex align-items-center p-3 item-opcoes-mobile">
        <a href=""class="ml-3 text-dark text-decoration-none w-100"></a>

        <div class="cart-items-number d-flex ml-auto">
            <input wire:click.prevent="alterarQuantidade({{ $pedidoProduto->id }}, 'remover')" type='button'
                   value='-' class='qtyminus btn btn-success btn-sm' field='quantity'/>

            <div class='qty form-control' style="margin-top: 6px">
                {{ $pedidoProduto->quantidade }}
            </div>

            <input wire:click.prevent="alterarQuantidade({{ $pedidoProduto->id }}, 'adicionar')" type='button'
                   value='+' class='qtyplus btn btn-success btn-sm' field='quantity'/>
        </div>

        <div wire:click="removerPedidoProduto({{ $pedidoProduto->id }})" class="d-flex ml-auto"
             style="font-size: 20px; color: #797979; padding-left: 7px">
            <i class="icofont-trash"></i>
        </div>
    </div>
    <!----------- / Item opções/ações mobile ----------->
</div>

<style>
    .item-opcoes-desktop {
        display: none !important;
    }
    .item-opcoes-mobile {
        display: none !important;
    }
    @media only screen and (max-width: 600px) {
        .item-opcoes-mobile {
            display: flex !important;
        }
    }
    @media only screen and (min-width: 601px) {
        .item-opcoes-desktop {
            display: flex !important;
        }
    }
</style>
