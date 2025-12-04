<?php

namespace App\Http\Livewire\Site\Carrinho;

use App\Http\Livewire\Site\Produto\Traits\PedidoDetalheTxtTrait;
use App\Models\Configuracao;
use Livewire\Component;

class PedidoWhatsapp extends Component
{
    use PedidoDetalheTxtTrait;

    private const WHATSAPP_NEW_LINE = "%0a";

    public $href;

    protected $listeners = ['whatsAppPedido'];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.site.carrinho.pedido_whatsapp');
    }

    /**
     * Recebe notificação do componente Pedido para mostrar o mostrar o modal com botão do WhatsApp
     * que quando o usuário aperta encaminha o pedido via WhatsApp.
     *
     * @param $id
     */
    public function whatsAppPedido($id)
    {
        $pedido = \App\Models\Pedido\Pedido::find($id);

        // Encerrando o Pedido
        $pedido->session = null;
        $pedido->status = 2; // Concluído
        $pedido->save();

        $this->href = $this->whatsAppUrlBuild($pedido);

        $this->dispatchBrowserEvent('pedido-whatsapp-visualizar');
    }

    /**
     * @param \App\Models\Pedido\Pedido $pedido
     * @return string
     */
    private function whatsAppUrlBuild($pedido)
    {
        $configuracao = Configuracao::first();
        $url = "{$configuracao->whatsapp_link}&text=";

        $url .= $this->pedidoTxt($pedido, self::WHATSAPP_NEW_LINE, ' ');

        return $url;
    }
}
