<?php

namespace App\Http\Livewire\Site\Produto;

use App\Models\Pedido\PedidoProdutoGrupoComplemento;
use Livewire\Component;

class PedidoProdutoGrupo extends Component
{
    public $index;

    public $quantidadeUtilizada = 0;

    public $carga;

    public function mount($carga, $index)
    {
        $this->index = $index;

        $this->carga = $carga;
    }

    public function render()
    {
        return view('livewire.site.produto.pedido_produto_grupo');
    }

    public function adicionar($index)
    {
        if ($this->quantidadeUtilizada == $this->carga['produtoGrupo']['quantidade_maxima'])
            return;

        $produtoComplemento = $this->carga['pedidoProdutoGrupoComplementos'][$index];
        $produtoComplemento['quantidade']++;
        $this->carga['pedidoProdutoGrupoComplementos'][$index] = $produtoComplemento;

        $this->quantidadeUtilizada++;

        $this->verificarValido();
        $this->calcularTotal();
        $this->enviarCarga();
    }

    public function remover($index)
    {
        $produtoComplemento = $this->carga['pedidoProdutoGrupoComplementos'][$index];

        if ($this->quantidadeUtilizada == 0 || $produtoComplemento['quantidade'] - 1 < 0)
            return;

        $produtoComplemento['quantidade']--;
        $this->carga['pedidoProdutoGrupoComplementos'][$index] = $produtoComplemento;

        $this->quantidadeUtilizada--;

        $this->verificarValido();
        $this->calcularTotal();
        $this->enviarCarga();
    }

    public function enviarCarga()
    {
        $this->emit('syncPedidoProdutoGrupo', $this->carga, $this->index);
    }

    private function calcularTotal()
    {
        $total = 0.0;

        foreach ($this->carga['pedidoProdutoGrupoComplementos'] as $complemento)
            if ($complemento['preco'] && $complemento['quantidade'] > 0)
                $total += $complemento['preco'] * $complemento['quantidade'];

        $this->carga['pedidoProdutoGrupo']['total'] = $total;
    }

    private function verificarValido()
    {
        $produtoGrupo = $this->carga['produtoGrupo'];

        // Não ê VALIDO direto, se é obrigatório e a quantidade utilizada foi 0
        if($produtoGrupo['tipo'] == 2 && $this->quantidadeUtilizada == 0)
            $this->carga['valido'] = false;
        // Válido DIRETO, sem precisar verificar a quantidade minima é 0
        else if ($produtoGrupo['quantidade_minima'] == 0)
            $this->carga['valido'] = true;
        else if($produtoGrupo['quantidade_minima'] > 0 && $this->quantidadeUtilizada == 0)
            $this->carga['valido'] = true;
        else if ($this->quantidadeUtilizada >= $produtoGrupo['quantidade_minima'])
            $this->carga['valido'] = true;
        else if ($produtoGrupo['quantidade_maxima'] == $this->quantidadeUtilizada)
            $this->carga['valido'] = true;
        else
            $this->carga['valido'] = false;
    }
}
