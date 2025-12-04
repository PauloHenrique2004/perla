<?php
namespace App\Http\Livewire\Gestor;

use App\Http\Livewire\Site\Produto\Traits\PedidoDetalheTxtTrait;
use Livewire\Component;

class PedidoDetalheTxt extends Component
{
    use PedidoDetalheTxtTrait;

    public $pedido;
    public $detalhes;

    public function mount($pedido)
    {
        $this->pedido = $pedido;
        $this->detalhes = $this->pedidoTxt($pedido, '<br>', '&nbsp');
    }

    public function render()
    {
        return view('livewire.gestor.pedido_detalhes_txt');
    }
}
