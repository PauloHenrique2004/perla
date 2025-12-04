<?php

namespace  App\Http\Livewire\Site\Produto\Traits;

use App\Models\Pedido\PedidoProdutoGrupoComplemento;

trait PedidoProdutoGrupoCargasTrait
{
    public $produtoGrupos = [];
    public $pedidoProdutoGrupoCargas = [];

    public $pedidoProdutoGrupoValido = true;

    public function mountPedidoProdutoGrupoCargas() {
        foreach ($this->produto->grupos as $grupo)
            $this->produtoGrupos[] = $grupo;

        $this->mountCargas();
        $this->verificarPedidoProdutoGrupoValido();
    }

    public function syncPedidoProdutoGrupo($carga, $index)
    {
        $this->pedidoProdutoGrupoCargas[$index] = $carga;

        $this->recalcularTotal();
        $this->verificarPedidoProdutoGrupoValido();
    }

    public function pedidoProdutoGrupoTotal()
    {
        $total = 0.0;

        foreach ($this->pedidoProdutoGrupoCargas as $carga)
            $total += $carga['pedidoProdutoGrupo']['total'];

        return $total;
    }

    public function verificarPedidoProdutoGrupoValido()
    {
        // Valido inicialmente se o produto não tiver preço a partir de
        $this->pedidoProdutoGrupoValido = true;

        foreach ($this->pedidoProdutoGrupoCargas as $carga)
            if (!$carga['valido']) {
                $this->pedidoProdutoGrupoValido = false;
                break;
            }

        // Se o preço a partir de é maior que R$ 0,00 e o total estiver zerado,
        // desabilita o botão de adicionar deixando `pedidoProdutoGrupoValido` como false
        if($this->produto->preco_a_partir_de > 0 && $this->total == 0)
            $this->pedidoProdutoGrupoValido = false;

        return $this->pedidoProdutoGrupoValido;
    }

    private function mountCargas()
    {
        foreach ($this->produto->grupos as $produtoGrupo) {
            $pedidoProdutoGrupoComplementos = [];

            $pedidoProdutoGrupo = new \App\Models\Pedido\PedidoProdutoGrupo([
                'nome' => $produtoGrupo->nome,
                'total' => 0.0
            ]);

            foreach ($produtoGrupo->complementos as $produtoComplemento)
                $pedidoProdutoGrupoComplementos[] = new PedidoProdutoGrupoComplemento([
                    'nome' => $produtoComplemento->nome,
                    'descricao' => $produtoComplemento->descricao,
                    'preco' => $produtoComplemento->preco,
                    'quantidade' => 0
                ]);

            $pedidoProdutoGrupo = [
                'produtoGrupo' => $produtoGrupo,
                'pedidoProdutoGrupo' => $pedidoProdutoGrupo,
                'pedidoProdutoGrupoComplementos' => $pedidoProdutoGrupoComplementos,
                'valido' => $this->pedidoProdutoGrupoValido($produtoGrupo)
            ];

            $this->pedidoProdutoGrupoCargas[] = $pedidoProdutoGrupo;
        }
    }

    private function pedidoProdutoGrupoValido($produtoGrupo)
    {
        // Somente válido inicialmente se o grupo for opcional
        return $produtoGrupo->tipo == 1;
    }
}

?>
