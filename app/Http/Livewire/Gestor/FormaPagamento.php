<?php
namespace App\Http\Livewire\Gestor;

use Livewire\Component;

class FormaPagamento extends Component
{
    /**
     * @var \App\Models\FormaPagamento
     */
    public $formaPagamento;

    protected $rules = [
        'formaPagamento.nome' => 'required'
    ];

    public function mount($id = null)
    {
        $this->formaPagamento = $id ? \App\Models\FormaPagamento::find($id) : new \App\Models\FormaPagamento();
    }

    public function render()
    {
        return view('livewire.gestor.forma_pagamento');
    }

    public function salvar()
    {
        $this->validate();

        $this->formaPagamento->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }
}
