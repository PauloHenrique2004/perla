<div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
    <!-- payment header -->
    <div class="card-header bg-white border-0 p-0" id="headingfour">
        <h2 class="mb-0">
            <button
                class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true"
                aria-controls="collapsethree" wire:click="changeCard('pagamento')">
                <span class="c-number">3</span> Pagamento
            </button>
        </h2>
    </div>

    <!-- body payment -->
    <div id="collapsethree" class="collapse show" aria-labelledby="headingfour"
         data-parent="#accordionExample">

        <div class="card-body px-3 pb-3 pt-1 border-top">
            <div class="schedule">
{{--                <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">--}}
{{--                    <li class="nav-item" role="presentation">--}}
{{--                        <a class="nav-link active text-dark" id="outrasFormas-tab" data-toggle="tab"--}}
{{--                           href="#outrasFormas"--}}
{{--                           role="tab" aria-controls="outrasFormas" aria-selected="true">--}}
{{--                            <p class="mb-0 font-weight-bold">--}}
{{--                                <i class="icofont-globe mr-2"></i> Formas de Pagamentos--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <div class="tab-content bg-white" id="myTabContent">
                    @include('livewire.site.carrinho.pagamento._outras_formas')
                </div>
            </div>
        </div>

        @include('livewire.site.carrinho.pagamento._cupom_desconto', compact('pedido'))

        <div class="card-body px-3 pb-3 pt-1">
            <button wire:click="comprar()"
                    @unless($pedidoValido) disabled @endunless
                    class="btn btn-success btn-lg btn-block @unless($pedidoValido) btn-disabled @endunless mt-3"
                    type="button">
                CONTINUAR
            </button>
        </div>
    </div>
</div>

<style>
    .btn-disabled {
        background: #7f7f7f !important;
        border-color: #7f7f7f !important;
    }
</style>
