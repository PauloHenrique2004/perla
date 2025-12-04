<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;

use App\Models\Pedido\PedidoProduto;
use Illuminate\Support\Facades\DB;

trait PedidoProdutosTrait
{
    use ProdutoQuantidadeTrait;

    public $produtosSubTotal = 0.0;

    public function mountPedidoProdutos()
    {
        $this->mountProdutoQuantidade();
        $this->calcularProdutosSubTotal();
    }

    public function calcularProdutosSubTotal()
    {
        $this->produtosSubTotal = $this->pedido->totalProdutos();
    }

    public function removerPedidoProduto($pedidoProduto)
    {
        $pedidoProduto = $this->pedidoProdutoViaId($pedidoProduto);

        if (!$pedidoProduto)
            return;

        DB::transaction(function () use ($pedidoProduto) {
            foreach ($pedidoProduto->pedidoProdutoGrupos as $pedidoProdutoGrupo)
                $pedidoProdutoGrupo->pedidoProdutoGrupoComplementos()->delete();

            $pedidoProduto->pedidoProdutoGrupos()->delete();

            $pedidoProduto->delete();

            $this->pedido->refresh();

            $this->calcularProdutosSubTotal();
            $this->calcularTotal();
            $this->somarQuantidade();
        });
    }

    public function removerPedidoProdutosInativos()
    {
        foreach ($this->pedido->produtos as $pedidoProduto)
            if (!$pedidoProduto->produto->ehAtivo())
                $this->removerPedidoProduto($pedidoProduto->id);
    }
}
