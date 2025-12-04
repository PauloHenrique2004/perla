<div class="m-3" style="display: flex">
    <div class="form-group" style="width: 100%; max-width: 245px">
        <label for="cupomDesconto" style="font-size: 16px; font-weight: bold">
            <i class="icofont-ticket" style="font-size: 30px"></i> Cupom de Desconto
        </label>

        @if($cupom)
            <input type="text" class="form-control" id="cupomDesconto" value="{{ $cupom->codigo }}" disabled>
        @else
            <input type="text" class="form-control" id="cupomDesconto" wire:model.debounce.100ms="cupomDescontoCodigo">
        @endif
    </div>

    @if($cupom)
        <button wire:click="cupomDescontoRemover()" class="btn btn-success" type="button"
                style="height: 35px; margin-top: 33px; margin-left: 5px">
            <i class="icofont-trash"></i> Remover
        </button>
    @else
        <button wire:click="cupomDescontoAplicar()" class="btn btn-success" type="button"
                style="height: 35px; margin-top: 33px; margin-left: 5px">
            Aplicar
        </button>
    @endif
</div>
