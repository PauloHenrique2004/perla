<div class="tab-pane fade show active" id="outrasFormas" role="tabpanel" aria-labelledby="outrasFormas-tab">
    <div class="osahan-card-body pt-3">
        <form>
            <div class="form-row pt-3">
                <div class="col-md-12 form-group">
                    <select wire:model="pedido.forma_pagamento_id" class="custom-select form-control">
                        <option value="">Clique e escolha a forma de Pagamento</option>

                        @foreach($formasPagamento as $formaPagamento)
                            <option value="{{ $formaPagamento->id }}">{{ $formaPagamento->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
