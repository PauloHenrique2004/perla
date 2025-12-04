<?php

namespace App\Http\Livewire\Gestor\Usuario;

use App\Models\Endereco\EnderecosAtendido;
use App\Models\UserEndereco;
use Canducci\Cep\CepResponse;
use Livewire\Component;

class Endereco extends Component
{
    protected $listeners = ['salvar'];

    /**
     * @var UserEndereco
     */
    public $endereco;
    public $enderecosAtendidos;
    public $index;

    protected $rules = [
        'endereco.user_id' => 'required',
        'endereco.endereco_atendido_id' => 'required',
        'endereco.numero' => 'required|string',
        'endereco.endereco' => 'required|string',
        'endereco.complemento' => 'string'
    ];

    public function mount($endereco, $index)
    {
        $this->endereco = $endereco;
        $this->index = $index;

        $this->enderecosAtendidos = EnderecosAtendido::all();

        if ($this->endereco->id)
            $this->enderecoValido = true;
    }

    public function salvar()
    {
        if (!$this->endereco->isDirty())
            return;

        $this->validate();

        $this->endereco->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Endereço - Salvo com sucesso!']);
    }

    public function updated($name)
    {
        $this->validateOnly($name);

        $this->emit('syncEndereco', $this->endereco, $this->index);
    }

    public function remover()
    {
        if ($this->endereco->id)
            $this->endereco->delete();

        $this->emit('syncEndereco', $this->endereco, $this->index, true);

        $this->dispatchBrowserEvent('notify', ['message' => 'Endereço - Removido com sucesso!']);
    }

    public function render()
    {
        return view('livewire.gestor.usuario.endereco');
    }
}
