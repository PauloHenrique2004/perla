<div class="modal fade" id="finalizarPedidoModal" tabindex="-1" role="dialog"
     aria-labelledby="finalizarPedidoModal"
     data-backdrop="static" data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Finalizar Pedido</h5>
            </div>

            <div class="modal-body">
                <div>Aperte em CONFIRMAR PEDIDO, assim iremos receber seu pedido via WhatsApp.</div>
            </div>

            <div class="modal-footer p-0 border-0">
                <div class="col-12 m-0 p-0">
                    <a href="/" class="btn btn-success btn-lg btn-block" id="novoPedido">
                        Realizar Novo Pedido
                    </a>

                    <a href="{{$href}}" class="btn btn-success btn-lg btn-block" target="_blank" style="color: #fff">
                        <div class="animate__animated animate__infinite animate__shakeX">
                            <i class="fa fa-whatsapp finalizar-pedido-whatsapp"></i>
                            <span>CONFIRMAR PEDIDO</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style wire:ignore>
    #finalizarPedidoModal .modal-title {
        text-transform: uppercase;
        color: #852627;
    }

    .finalizar-pedido-whatsapp {
        font-size: 25px;
        position: relative;
        padding-right: 24px;
        left: 0.7em;
        top: 3px;
    }

    #finalizarPedidoModal .animate__animated {
        --animate-duration: 7s;
    }

    #novoPedido {
        height: 30px;
        background: #505050;
        border: none;
        padding: 0;
        padding-top: 5px;
    }
</style>
