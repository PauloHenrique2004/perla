<div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">
    <!-- cart header -->
    <div class="card-header bg-white border-0 p-0" id="headingOne">
        <h2 class="mb-0">
            <button
                class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne" wire:click="changeCard('itens')">
                <span class="c-number">1</span> Itens
            </button>
        </h2>
    </div>
    <!-- body cart items -->
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
         data-parent="#accordionExample">
        <div class="card-body p-0 border-top">
            <div class="osahan-cart">
                @foreach($pedido->produtos as $pedidoProduto)
                    @include('livewire.site.carrinho.itens._produto', compact('pedidoProduto'))
                @endforeach
            </div>
        </div>
    </div>
</div>
