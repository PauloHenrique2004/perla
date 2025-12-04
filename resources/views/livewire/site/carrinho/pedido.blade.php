<div class="row">
    <div class="col-lg-8">
        <div class="accordion" id="accordionExample">
            <!-- Itens -->
            @include('livewire.site.carrinho.itens._itens', compact('currentCard', 'pedido', 'produtosSubTotal'))

            <!-- Endereço -->
            @include('livewire.site.carrinho.forma_entrega._forma_entrega', compact('currentCard', 'pedido', 'formasEntrega', 'usuarioEnderecos'))

            <!-- Pagamento -->
            @include('livewire.site.carrinho.pagamento._pagamento', compact('currentCard', 'formasPagamento', 'cupom', 'cupomDescontoCodigo', 'total'))
        </div>
    </div>

    @include('livewire.site.carrinho.total', compact('formaEntrega', 'usuarioEndereco', 'pedido', 'produtosSubTotal', 'quantidade', 'total'))

{{--    @include('livewire.site.carrinho.forma_entrega._endereco_formulario')--}}
</div>

<livewire:site.carrinho.pedido-whatsapp/>

@include('livewire.site.carrinho.forma_entrega._nao_logado')

@section('script')
    <div wire:ignore>
        <script>
            $(document).ready(function () {
                const body = $('body')[0];

                body.addEventListener('usuario-nao-logado-alerta-visualizar', (e) => {
                    $('#usuarioNaoLogadoModal').modal('show');
                });

                body.addEventListener('pedido-whatsapp-visualizar', (e) => {
                    audio = new Audio('/pay_success.mp3');
                    audio.play();

                    $('#finalizarPedidoModal').modal('toggle');
                });
            });
        </script>
    </div>
@endsection
