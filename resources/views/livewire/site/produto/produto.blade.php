<section class="py-4 osahan-main-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                {{-- wrapper com setas --}}
                <div class="position-relative mb-3 text-center">
                    @if($galeria && $galeria->count() > 1)
                        <button type="button"
                                class="btn btn-light position-absolute"
                                style="top: 50%; left: 10px; transform: translateY(-50%); z-index: 5; background:#abc49b; color: #fff !important;"
                                wire:click="imagemAnterior">
                            ‹
                        </button>

                        <button type="button"
                                class="btn btn-success position-absolute"
                                style="top: 50%; right: 10px; transform: translateY(-50%); z-index: 5; background:#abc49b; color: #fff !important;"
                                wire:click="proximaImagem">
                            ›
                        </button>
                    @endif

                    <img alt="{{ $produto->nome }}"
                         src="{{ $imagemAtiva }}"
                         class="produto-img img-fluid mx-auto shadow-sm rounded">
                </div>

                {{-- thumbnails embaixo --}}
                @if($galeria && $galeria->count())
                    <div class="d-flex justify-content-center flex-wrap">
                        @foreach($galeria as $idx => $img)
                            @php $url = asset($img->imagem); @endphp
                            <div class="mx-1 mb-2" style="cursor:pointer;">
                                <img src="{{ $url }}"
                                     alt="{{ $produto->nome }}"
                                     style="width:70px;height:70px;object-fit:cover;border-radius:8px;
                                         border:2px solid {{ $imagemAtivaIndex === $idx ? '#28a745' : '#ddd' }};"
                                     wire:click="trocarImagem({{ $img->id }})">
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- bloco de adicionar / quantidade permanece igual --}}
                <div class="pd-f d-flex mb-3 adicionar-pedido-desktop">
                    <div wire:click.prevent="fazerPedido"
                         class="btn btn-warning p-3 rounded btn-lg btn-adicionar @unless($pedidoProdutoGrupoValido) disabled @endif">
                        <div style="float: left">Adicionar</div>
                        <div style="float: right">R$ {{ number_format($total, 2, ',', '.') }}</div>
                    </div>

                    <div class="cart-items-number d-flex">
                        <input type='button' value='-' class='qtyminus btn btn-success btn-sm'
                               wire:click="alterarQuantidade('remover')"/>
                        <input type='text' maxlength="3" wire:model.debounce.1000ms="quantidade" name='quantity'
                               class='qty form-control'/>
                        <input type='button' value='+' class='qtyplus btn btn-success btn-sm'
                               wire:click="alterarQuantidade('adicionar')"/>
                    </div>
                </div>
            </div>




            <div class="col-lg-6">
                <div class="bg-white rounded shadow-sm">
                    <div style="padding-top: 15px; padding-left: 10px">
                        <h1 style="font-size: 15px" class="font-weight-bold">{{ $produto->nome }}</h1>
                    </div>

                    <!-- Descrição -->
                    @if($produto->descricao)
                        <div class="details" style="padding-left: 10px">
                            <p class="text-muted small mb-0">
                                {{ $produto->descricao }}
                            </p>
                        </div>
                @endif
                <!-- / Descrição -->

                    <div class="grupos">
                        @include('livewire.site.produto._produto_pedido_produto_grupos', compact('pedido', 'produtoGrupos'))
                    </div>

                    <!-- Compartilhar -->
                    <div class="p-3">
                        @include('livewire.site.produto._compartilhar', compact('compartilharUrl'))
                    </div>
                    <!-- / Compartilhar -->
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>

    <div class="adicionar-pedido-celular">
        <div class="pd-f d-flex align-items-center">
            <div wire:click="fazerPedido"
                 class="btn btn-warning p-3 rounded btn-lg btn-adicionar @unless($pedidoProdutoGrupoValido) disabled @endif">
                <div style="float: left">Adicionar</div>
                <div style="float: right">R$ {{ number_format($total, 2, ',', '.') }}</div>
            </div>

            <div class="cart-items-number d-flex">
                <input type='button' value='-' class='qtyminus btn btn-success btn-sm'
                       wire:click="alterarQuantidade('remover')"/>
                <input type='text' maxlength="3" wire:model="quantidade" name='quantity' class='qty form-control'/>
                <input type='button' value='+' class='qtyplus btn btn-success btn-sm'
                       wire:click="alterarQuantidade('adicionar')"/>
            </div>
        </div>
    </div>

    {{-- Modal pós-adicionar ao carrinho --}}
    <div class="modal fade" id="modalProdutoAdicionado" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 rounded-lg shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title" style="color:#af9174;">
                        Produto adicionado ao carrinho
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-2 font-weight-bold" id="modal-produto-nome"></p>
                    <p class="mb-0 text-muted">
                        Deseja concluir o pedido agora ou continuar comprando?
                    </p>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-between">

                    <a href="{{ route('home') }}">
                        <button type="button"
                                class="btn btn-outline-secondary" style="background: #abc49b; border-color: #abc49b; color: #fff">
                            Continuar comprando
                        </button>
                    </a>


                    <a href="{{ route('carrinho') }}"
                       class="btn text-white"
                       style="background:#af9174;">
                        Concluir pedido
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    .endereco-box {
        border: 1px solid #882f30;
        padding: 5px 0 9px 7px;
        border-radius: 10px;
        margin-top: 10px;
        margin-left: -13px;
    }

    .btn-adicionar {
        max-width: 200px;
        height: 54px;
        text-align: unset;
        min-width: 200px;
        display: initial;
    }

    .cart-items-number {
        border-radius: .40rem;
        padding: 3px;
        background: #fff;
        width: fit-content;
        height: 54px;
        padding-top: 11px;
        padding-left: 20px;
        margin-left: 8px;
        padding-right: 20px;
    }

    .cart-items-number .qtyminus, .cart-items-number .qtyplus {
        border: none !important;
        box-shadow: none;
        color: #fec12a;
    }

    .cart-items-number .qtyminus:hover, .cart-items-number .qtyplus:hover, .cart-items-number .qtyminus:focus, .cart-items-number .qtyplus:focus {
        background: none !important;
        color: #c8961d !important;
    }

    .cart-items-number .qtyminus {
        font-size: 35px;
    }

    .cart-items-number .qtyplus {
        font-size: 30px;
    }

    .cart-items-number .qty {
        font-size: 27px;
        max-width: 50px;
    }

    .grupos {
        max-height: 400px;
        overflow: scroll;
        margin-top: 7px;
    }

    .produto-img {
        height: 500px;
        width: 500px;
        object-fit: cover
    }

    /*************** Adicionar Pedido ***************/
    .adicionar-pedido-celular {
        position: fixed;
        width: 100%;
        background: #fff;
        border-top: 1px solid #9c9c9c;
        padding-bottom: 5px;
        bottom: 0;
        padding-left: 10px;
        padding-top: 5px;
        z-index: 999;
    }

    .adicionar-pedido-desktop {
        width: fit-content;
        margin: 0 auto;
    }

    /* Quando Celular */
    @media (max-width: 1024px) {
        .adicionar-pedido-desktop {
            display: none !important;
        }

        @if($produto->grupos->count() > 0)
        .recommend-slider {
            display: none;
        }

        @endif

        .grupos {
            max-height: unset;
        }

        #horarioFuncionamento {
            margin-bottom: 4em;
        }
    }

    /* Quando Desktop */
    @media (min-width: 1025px) {
        .adicionar-pedido-celular {
            display: none !important;
        }
    }

    /*************** / Adicionar Pedido ***************/

    .modal-content {
        border-radius: 18px;
    }

    .modal-title {
        font-weight: 600;
    }


</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('produto-adicionado', function (event) {
            if (event.detail && event.detail.nome) {
                const nomeEl = document.getElementById('modal-produto-nome');
                if (nomeEl) {
                    nomeEl.textContent = event.detail.nome + ' foi adicionado ao carrinho.';
                }
            }

            $('#modalProdutoAdicionado').modal('show');
        });
    });
</script>
