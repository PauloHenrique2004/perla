<?php

namespace App\Http\Livewire\Gestor;

use App\Models\Endereco\EnderecosAtendido;
use Livewire\Component;

class CupomDesconto extends Component
{
    public \App\Models\CupomDesconto $cupomDesconto;

    protected $rules = [
        'cupomDesconto.codigo' => 'required',
        'cupomDesconto.qtd_uso_maxima' => 'required',
        'cupomDesconto.validade' => 'required',
        'cupomDesconto.valor' => 'required:numeric|min:0|not_in:0',
        'cupomDesconto.valor_minimo_pedido' => 'required:numeric|min:0'
    ];

    public function mount(\App\Models\CupomDesconto $cupomDesconto)
    {
        $this->cupomDesconto = $cupomDesconto;
    }

    public function salvar()
    {
        $this->validate();

        $this->cupomDesconto->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    public function render()
    {
        return view('livewire.gestor.cupom_desconto')->layout('layouts.gestor.gestor');
    }
}
