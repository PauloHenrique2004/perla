<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;


use App\Models\FormaEntrega;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait PedidoEntregaTrait
{
    public $formasEntrega = [];
    /**
     * @var FormaEntrega
     */
    public $formaEntrega;

    public $usuarioEnderecos = [];
    /**
     * @var UserEndereco
     */
    public $usuarioEndereco;

    public $informarEndereco = false;

    public function mountPedidoEntrega()
    {
        $this->formasEntrega = FormaEntrega::all();

        $this->obterFormaDeEntrega();
    }

    public function alterarClienteEnderecoId($enderecoId)
    {
        $this->pedido->cliente_endereco_id = $enderecoId;

        if ($this->pedido->cliente_endereco_id) {
            $this->usuarioEndereco = UserEndereco::find($enderecoId);
            $this->pedido->valor_entrega = $this->usuarioEndereco->enderecoAtendido->valor;
        } else {
            $this->pedido->valor_entrega = 0.0;
            $this->usuarioEndereco = null;
        }

        $this->calcularProdutosSubTotal();
        $this->calcularTotal();

        $this->pedido->save();
    }

    public function alterarFormaEntrega($id)
    {
        $this->pedido->forma_entrega_id = $id;
        $this->formaEntregaAtualizada();
    }

    public function formaEntregaAtualizada()
    {
        $this->obterFormaDeEntrega();
    }

    public function obterUsuarioEnderecos()
    {
        $this->usuarioEnderecos = \Auth::user()->enderecos;
    }

    public function editarEndereco($enderecoId = null)
    {
        Session::put('url.intended', route('carrinho'));

        if ($enderecoId)
            redirect(route('user.meus-enderecos.edit', $enderecoId));
        else
            redirect(route('user.meus-enderecos.create'));
    }

    private function obterFormaDeEntrega()
    {
        if ($this->pedido->forma_entrega_id) {
            $this->formaEntrega = FormaEntrega::find($this->pedido->forma_entrega_id);

            if ($this->formaEntrega->informar_endereco) {
                if (!Auth::check())
                    $this->formaEntregaDeliveryUsuarioNaoLogado();
                else
                    $this->formaEntregaDeliverySelecionada();
            } else {
                $this->informarEndereco = false;

                $this->pedido->cliente_endereco_id = null;
                $this->usuarioEndereco = null;
                $this->pedido->valor_entrega = 0.0;

                $this->calcularProdutosSubTotal();
                $this->calcularTotal();
            }
        } else {
            $this->removerFormaEntrega();

            $this->calcularProdutosSubTotal();
            $this->calcularTotal();
        }

        $this->pedido->save();
    }

    private function formaEntregaDeliverySelecionada()
    {
        $this->informarEndereco = $this->formaEntrega->informar_endereco;

        $this->obterUsuarioEnderecos();

        if(sizeof($this->usuarioEnderecos) > 0) {
            // Se o usuário não tiver um endereço selecionado, seleciona o primeiro
            if (!$this->pedido->cliente_endereco_id)
                $this->alterarClienteEnderecoId($this->usuarioEnderecos[0]->id);
            else {
                // Se o endereço selecionado pelo cliente estiver inativado/excluído, necessário remover-lo do pedido
                if (!$this->pedido->clienteEndereco->enderecoAtendido->ehAtivo())
                    $this->pedido->cliente_endereco_id = null;
                else
                    $this->usuarioEndereco = $this->pedido->clienteEndereco;
            }
        }
    }

    private function formaEntregaDeliveryUsuarioNaoLogado()
    {
        $this->removerFormaEntrega();

        // Setando a URL para retornar para o carrinho assim que fizer o login
        Session::put('url.intended', route('carrinho'));

        $this->dispatchBrowserEvent('usuario-nao-logado-alerta-visualizar');
    }

    private function removerFormaEntrega()
    {
        $this->formaEntrega = null;
        $this->informarEndereco = false;

        $this->pedido->forma_entrega_id = null;
        $this->pedido->valor_entrega = null;
        $this->pedido->cliente_endereco_id = null;
    }
}
