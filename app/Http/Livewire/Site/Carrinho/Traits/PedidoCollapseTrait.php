<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;


use App\Models\FormaEntrega;

trait PedidoCollapseTrait
{
    public $currentCard = 'itens';

    public function changeCard($card)
    {
        $this->currentCard = $card;
    }
}
