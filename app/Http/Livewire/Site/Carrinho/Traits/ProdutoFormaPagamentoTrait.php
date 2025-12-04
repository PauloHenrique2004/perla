<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;

use App\Models\FormaPagamento;

trait ProdutoFormaPagamentoTrait
{
    public $formasPagamento = [];

    public function mountFormaPagamento()
    {
        $this->formasPagamento = FormaPagamento::all();
    }

    public function formaPagamentoAtualizada()
    {
        if (!$this->pedido->forma_pagamento_id)
            return;

        $this->pedido->save();
    }
}
