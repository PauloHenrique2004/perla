<?php

namespace  App\Http\Livewire\Site\Produto\Traits;

use App\Models\Pedido\Pedido;
use App\Models\Pedido\PedidoProduto;
use App\Models\Pedido\PedidoProdutoGrupo;
use App\Models\Pedido\PedidoProdutoGrupoComplemento;
use App\Util\Sessao\Sessao;
use Illuminate\Support\Facades\DB;

trait ProdutoPedidoTrait
{
    use PedidoProdutoGrupoCargasTrait;

    public \App\Models\Pedido\Pedido $pedido;

    public function mountProdutoPedido()
    {
        $this->pedido = Pedido::pedidoPendente(Sessao::id());

        $this->mountPedidoProdutoGrupoCargas();
    }

    public function fazerPedido()
    {
        if (!$this->verificarPedidoProdutoGrupoValido())
            return;

        DB::transaction(function () {
            $pedidoProduto = $this->makePedidoProduto();

            foreach ($this->pedidoProdutoGrupoCargas as $carga) {
                $pedidoProdutoGrupo = $this->makePedidoProdutoGrupo($pedidoProduto, $carga['pedidoProdutoGrupo']);

                foreach ($carga['pedidoProdutoGrupoComplementos'] as $complemento)
                    $this->makePedidoProdutoGrupoComplemento($pedidoProdutoGrupo, $complemento);
            }

            $this->emit('atualizarCarrinhoHeader');
            $this->dispatchBrowserEvent('notify', ['message' => 'Adicionado ao carrinho']);
        });
    }

    private function makePedidoProduto()
    {
        $pedidoProduto = new PedidoProduto([
            'pedido_id' => $this->pedido->id,
            'produto_id' => $this->produto->id,
            'nome' => $this->produto->nome,
            'preco' => $this->produto->preco,
            'preco_promocional' => $this->produto->preco_promocional,
            'quantidade' => $this->quantidade,
            'total' => $this->recalcularTotal()
        ]);

        $pedidoProduto->saveOrFail();

        return $pedidoProduto;
    }

    private function makePedidoProdutoGrupo(PedidoProduto $pedidoProduto, $carga)
    {
        $pedidoProdutoGrupo = new PedidoProdutoGrupo([
            'pedido_produto_id' => $pedidoProduto->id,
            'nome' => $carga['nome'],
            'total' => $carga['total']
        ]);

        $pedidoProdutoGrupo->saveOrFail();

        return $pedidoProdutoGrupo;
    }

    private function makePedidoProdutoGrupoComplemento(PedidoProdutoGrupo $pedidoProdutoGrupo, $carga)
    {
        if ($carga['quantidade'] == 0)
            return null;

        $pedidoProdutoGrupoComplemento = new PedidoProdutoGrupoComplemento([
            'pedido_produto_grupo_id' => $pedidoProdutoGrupo->id,
            'nome' => $carga['nome'],
            'descricao' => $carga['descricao'],
            'preco' => $carga['preco'],
            'quantidade' => $carga['quantidade']
        ]);

        $pedidoProdutoGrupoComplemento->saveOrFail();

        return $pedidoProdutoGrupoComplemento;
    }
}

?>
