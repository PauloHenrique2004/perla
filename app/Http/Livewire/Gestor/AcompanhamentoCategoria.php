<?php
namespace App\Http\Livewire\Gestor;

use Livewire\Component;

class AcompanhamentoCategoria extends Component
{
    /**
     * @var \App\Models\AcompanhamentoCategoria
     */
    public $acompanhamentoCategoria;

    protected $rules = [
        'acompanhamentoCategoria.nome' => 'required'
    ];

    public function mount($id = null)
    {
        $this->acompanhamentoCategoria = $id ? \App\Models\AcompanhamentoCategoria::find($id) : new \App\Models\AcompanhamentoCategoria();
    }

    public function render()
    {
        return view('livewire.gestor.acompanhamento_categoria');
    }

    public function salvar()
    {
        $this->validate();

        $this->acompanhamentoCategoria->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }
}
