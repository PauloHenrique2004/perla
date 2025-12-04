<?php
namespace App\Http\Livewire\Gestor;

use Livewire\Component;

class Acompanhamento extends Component
{
    /**
     * @var \App\Models\Acompanhamento
     */
    public $acompanhamento;
    /**
     * @var \App\Models\Acompanhamento[]
     */
    public $categorias;

    protected $rules = [
        'acompanhamento.categoria_id' => 'required',
        'acompanhamento.nome' => 'required',
        'acompanhamento.valor' => 'required'
    ];

    public function mount($id = null)
    {
        $this->acompanhamento = $id ? \App\Models\Acompanhamento::find($id) : new \App\Models\Acompanhamento();
        $this->categorias = \App\Models\AcompanhamentoCategoria::all();
    }

    public function render()
    {
        return view('livewire.gestor.acompanhamento');
    }

    public function salvar()
    {
        $this->validate();

        $this->acompanhamento->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }
}
