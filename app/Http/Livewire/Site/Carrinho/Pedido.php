<?php

namespace App\Http\Livewire\Site\Carrinho;

use App\Http\Livewire\Site\Carrinho\Traits\PedidoCollapseTrait;
use App\Http\Livewire\Site\Carrinho\Traits\PedidoEntregaTrait;
use App\Http\Livewire\Site\Carrinho\Traits\PedidoFinalizarTrait;
use App\Http\Livewire\Site\Carrinho\Traits\PedidoProdutosTrait;
use App\Http\Livewire\Site\Carrinho\Traits\ProdutoCupomDescontoTrait;
use App\Http\Livewire\Site\Carrinho\Traits\ProdutoFormaPagamentoTrait;
use App\Util\Sessao\Sessao;
use Livewire\Component;

class Pedido extends Component
{
    use PedidoCollapseTrait;
    use PedidoProdutosTrait;
    use PedidoEntregaTrait;
    use PedidoProdutosTrait;
    use ProdutoCupomDescontoTrait;
    use ProdutoFormaPagamentoTrait;
    use PedidoFinalizarTrait;

    protected $listeners = [];

    public \App\Models\Pedido\Pedido $pedido;

    public $total = 0.0;

    protected $rules = [
        'pedido.forma_entrega_id' => ['required'],
        'pedido.forma_pagamento_id' => ['required'],
        'cupomDescontoCodigo' => ''
    ];

    public function mount()
    {
        $this->obterPedido();

        $this->mountPedidoProdutos();
        $this->mountPedidoEntrega();
        $this->mountCupomDesconto();
        $this->mountFormaPagamento();

        $this->calcularTotal();
    }

    public function updated($name)
    {
        if ($name == 'pedido.forma_entrega_id')
            $this->formaEntregaAtualizada();

        if ($name == 'pedido.forma_pagamento_id')
            $this->formaPagamentoAtualizada();

        $this->validateOnly($name);
    }

    public function render()
    {
        $this->removerPedidoProdutosInativos();
        $this->cupomVerificarValorMinimo();
        $this->verificarPedidoValido();

        $this->emit('atualizarCarrinhoHeader');

        return view('livewire.site.carrinho.pedido');
    }

    public function calcularTotal()
    {
        $this->total = 0.0;

        $this->total += $this->produtosSubTotal;

        if ($this->pedido->valor_entrega)
            $this->total += $this->pedido->valor_entrega;

        if ($this->pedido->valor_desconto)
            $this->total -= $this->pedido->valor_desconto;
    }

    public function obterPedido()
    {
        $this->pedido = \App\Models\Pedido\Pedido::pedidoPendente(Sessao::id());
    }
}
