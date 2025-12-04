<div style="display: flex">
    @if($enderecoAtendido->id)
        <div style="margin-right: 5px">
            <button class="btn btn-sm btn-default" wire:click.prevent="remover()" style="height: 38px; width: 35px">
                <i class="fas fa-trash-alt" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    <x-jquery-mask-money wire-model="enderecoAtendido.valor" id="valor" label=""
                         value="{{ $enderecoAtendido->valor }}"/>
</div>
