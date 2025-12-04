<?php

namespace App\Http\Livewire\Site\Produto;

use App\Http\Livewire\Site\Produto\Traits\ProdutoCompartilharTrait;
use App\Http\Livewire\Site\Produto\Traits\ProdutoPedidoTrait;
use App\Http\Livewire\Site\Produto\Traits\ProdutoQuantidadeTrait;
use Livewire\Component;

class Produto extends Component
{
    use ProdutoQuantidadeTrait;
    use ProdutoPedidoTrait;
    use ProdutoCompartilharTrait;

    protected $listeners = ['syncPedidoProdutoGrupo'];

    public $produto;
    public $total = 0;

    public $galeria = [];
    public $imagemAtiva;
    public $imagemAtivaIndex = 0;

    public function mount($id = null)
    {
        $this->inicializar($id);
        $this->setCompartilharUrl();
    }

    public function render()
    {
        return view('livewire.site.produto.produto');
    }

    public function updated($name)
    {
        if ($name == 'quantidade') {
            $this->quantidadeUpdated();
        }
    }

    private function inicializar($produtoId)
    {
        $this->produto = \App\Models\Produto\Produto::find($produtoId);

        // galeria
        $this->galeria = $this->produto->imagens()
            ->orderBy('id')
            ->get();

        if ($this->galeria->count()) {
            $this->imagemAtivaIndex = 0;
            $this->imagemAtiva      = asset($this->galeria[0]->imagem);
        } else {
            $this->imagemAtivaIndex = -1;
            $this->imagemAtiva      = asset($this->produto->fotoUrl());
        }

        $this->mountProdutoPedido();
        $this->recalcularTotal();
    }

    public function trocarImagem($id)
    {
        $index = $this->galeria->search(function ($img) use ($id) {
            return $img->id == $id;
        });

        if ($index !== false) {
            $this->imagemAtivaIndex = $index;
            $this->imagemAtiva      = asset($this->galeria[$index]->imagem);
        }
    }

    public function proximaImagem()
    {
        if ($this->galeria->count() === 0) {
            return;
        }

        $this->imagemAtivaIndex = ($this->imagemAtivaIndex + 1) % $this->galeria->count();
        $this->imagemAtiva      = asset($this->galeria[$this->imagemAtivaIndex]->imagem);
    }

    public function imagemAnterior()
    {
        if ($this->galeria->count() === 0) {
            return;
        }

        $this->imagemAtivaIndex =
            ($this->imagemAtivaIndex - 1 + $this->galeria->count()) % $this->galeria->count();

        $this->imagemAtiva = asset($this->galeria[$this->imagemAtivaIndex]->imagem);
    }

    private function recalcularTotal()
    {
        $this->total = $this->produto->preco_promocional
            ? $this->produto->preco_promocional
            : $this->produto->preco;

        $this->total += $this->pedidoProdutoGrupoTotal();
        $this->total *= $this->quantidade;

        return $this->total;
    }
}
