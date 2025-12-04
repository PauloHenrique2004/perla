<?php

namespace App\Http\Livewire\Gestor\Endereco;

use App\Models\Endereco\EnderecosAtendido;
use Livewire\Component;

class EnderecoAtendido extends Component
{
    public EnderecosAtendido $enderecoAtendido;

    protected $rules = [
        'enderecoAtendido.bairro' => 'required',
        'enderecoAtendido.valor' => 'required',
        'enderecoAtendido.ativo' => ''
    ];

    public function mount(EnderecosAtendido $enderecoAtendido)
    {
        $this->enderecoAtendido = $enderecoAtendido;
    }

    public function salvar()
    {
        $this->validate();

        $this->enderecoAtendido->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    public function render()
    {
        return view('livewire.gestor.endereco.endereco_atendido')->layout('layouts.gestor.gestor');
    }
}
