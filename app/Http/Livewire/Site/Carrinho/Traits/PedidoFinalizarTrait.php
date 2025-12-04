<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;


use App\Models\FormaEntrega;
use App\Models\Horario;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait PedidoFinalizarTrait
{
    public $pedidoValido = false;

    public function comprar()
    {
        $this->removerPedidoProdutosInativos();

        if (!$this->pedidoValidoVerificar())
            return;

        if ($this->pedido->cliente_endereco_id)
            $this->pedido->cliente_id = Auth::user()->id;

        $this->pedido->save();

        // Emitindo evendo para o componente Whatsapp com o ID do pedido
        $this->emit('whatsAppPedido', $this->pedido->id);
    }

    public function verificarPedidoValido()
    {
        $this->pedidoValido = $this->pedidoValidoVerificar();
    }

    public function pedidoValidoVerificar()
    {
        if (!Horario::lojaAberta())
            return false;
        elseif ($this->quantidade == 0)
            return false;
        elseif (!$this->pedido->forma_entrega_id)
            return false;
        elseif ($this->formaEntrega && $this->formaEntrega->informar_endereco && !$this->pedido->cliente_endereco_id)
            return false;
        elseif ($this->formaEntrega && $this->formaEntrega->informar_endereco && $this->pedido->clienteEndereco && !$this->pedido->clienteEndereco->enderecoAtendido->ehAtivo())
            return false;
        elseif (!$this->pedido->forma_pagamento_id)
            return false;
        elseif ($this->pedido->valorAPagar() <= 0)
            return false;

        return true;
    }
}
