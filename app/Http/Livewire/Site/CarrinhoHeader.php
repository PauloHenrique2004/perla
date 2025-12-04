<?php

namespace App\Http\Livewire\Site;

use App\Models\Pedido\Pedido;
use App\Util\Sessao\Sessao;
use Livewire\Component;

class CarrinhoHeader extends Component
{
    protected $listeners = ['atualizarCarrinhoHeader'];

    public $total = 0.0;

    public function mount()
    {
        $this->atualizarCarrinhoHeader();
    }

    public function render()
    {
        return view('livewire.site.carrinho_header');
    }

    public function atualizarCarrinhoHeader()
    {
        $this->total = $this->pedido()->totalProdutos();
    }

    public function pedido()
    {
        return Pedido::pedidoPendente(Sessao::id());
    }
}
