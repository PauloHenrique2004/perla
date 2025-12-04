<?php
namespace App\Http\Livewire\Gestor;

use Livewire\Component;

class FormaEntrega extends Component
{
    /**
     * @var \App\Models\FormaEntrega
     */
    public $formaEntrega;

    protected $rules = [
        'formaEntrega.nome' => 'required',
        'formaEntrega.informar_endereco' => ''
    ];

    public function mount($id = null)
    {
        $this->formaEntrega = $id ? \App\Models\FormaEntrega::find($id) : new \App\Models\FormaEntrega();
    }

    public function render()
    {
        return view('livewire.gestor.forma_entrega');
    }

    public function salvar()
    {
        $this->validate();

        $this->formaEntrega->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }
}
