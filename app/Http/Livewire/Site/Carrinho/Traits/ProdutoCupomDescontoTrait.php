<?php

namespace App\Http\Livewire\Site\Carrinho\Traits;

use App\Models\CupomDesconto;
use Illuminate\Support\Facades\DB;

trait ProdutoCupomDescontoTrait
{
    public $cupomDescontoCodigo;
    /**
     * @var CupomDesconto
     */
    public $cupom;

    public function mountCupomDesconto()
    {
        if ($this->pedido->cupom_desconto_id)
            $this->cupom = $this->pedido->cupomDesconto;
    }

    public function cupomVerificarValorMinimo()
    {
        if ($this->cupom && $this->cupom->trashed())
            $this->cupomDescontoRemover();
        else if ((!$this->cupom) || ($this->cupom && $this->produtosSubTotal >= $this->cupom->valor_minimo_pedido))
            return null;
        else
            $this->cupomDescontoRemover();
    }

    public function cupomDescontoAplicar()
    {
        $this->cupomDescontoCodigoErro = null;

        $cupom = CupomDesconto::valido()->buscaCodigo($this->cupomDescontoCodigo)->first();

        if ($cupom) {
            if ($this->produtosSubTotal < $cupom->valor_minimo_pedido)
                return $this->cupomAlertaPedidoMinimo($cupom);

            $this->cupom = $cupom;

            $this->pedido->cupom_desconto_id = $cupom->id;
            $this->pedido->valor_desconto = $cupom->valor;

            DB::transaction(function () {
                $this->pedido->save();
                $this->cupom->usado();

                $this->calcularProdutosSubTotal();
                $this->calcularTotal();
            });
        } else
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Cupom inválido.']);

        return null;
    }

    public function cupomDescontoRemover()
    {
        if (!$this->cupom)
            return;

        $this->pedido->cupom_desconto_id = null;
        $this->pedido->valor_desconto = null;

        DB::transaction(function () {
            $this->pedido->save();
            $this->cupom->estorno();

            $this->calcularProdutosSubTotal();
            $this->calcularTotal();
        });

        $this->cupom = null;
    }

    private function cupomAlertaPedidoMinimo($cupom)
    {
        $valorPedidoMinimo = number_format($cupom->valor_minimo_pedido, 2, ',', '.');
        $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => "Pedido mínimo R$ {$valorPedidoMinimo}"]);
        return null;
    }

}
