<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;

use App\Models\Pedido\PedidoProduto;

trait ProdutoQuantidadeTrait
{
    public $quantidade = 0;

    public function mountProdutoQuantidade()
    {
        $this->somarQuantidade();
    }

    public function alterarQuantidade($pedidoProdutoId, $type)
    {
        $pedidoProduto = $this->pedidoProdutoViaId($pedidoProdutoId);

        if (!$pedidoProduto)
            return;

        $quantidade = $pedidoProduto->quantidade;

        if ($type == 'adicionar')
            $quantidade += 1;
        else
            $quantidade -= 1;

        $pedidoProduto->alterarQuantidade($quantidade);

        $this->calcularProdutosSubTotal();
        $this->calcularTotal();
        $this->somarQuantidade();
    }

    /**
     * @param $id
     * @return PedidoProduto
     */
    public function pedidoProdutoViaId($id)
    {
        foreach ($this->pedido->produtos as $produto)
            if ($produto->id == $id)
                return $produto;
        return null;
    }

    public function somarQuantidade()
    {
        $this->quantidade = $this->pedido->quantidade();
    }
}
