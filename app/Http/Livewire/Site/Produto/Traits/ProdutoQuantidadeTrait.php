<?php

namespace  App\Http\Livewire\Site\Produto\Traits;

trait ProdutoQuantidadeTrait
{
    public $quantidade = 1;

    public function alterarQuantidade($type)
    {
        if ($type == 'adicionar')
            $this->quantidade += 1;
        else
            $this->quantidade -= 1;

        $this->quantidadeUpdated();;
    }

    public function quantidadeUpdated() {
        if ($this->quantidade <= 0)
            $this->quantidade = 1;

        $this->recalcularTotal();
    }
}
