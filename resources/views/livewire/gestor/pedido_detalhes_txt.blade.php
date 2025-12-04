<div class="modal fade" id="pedido{{ $pedido->id }}Modal" role="dialog"
     aria-labelledby="pedido{{ $pedido->id }}Modal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {!! $detalhes !!}
            </div>
        </div>
    </div>
</div>
