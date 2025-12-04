<?php
namespace App\Http\Livewire\Gestor;

use Livewire\Component;

class Horario extends Component
{
    /**
     * @var \App\Models\Horario
     */
    public $horario;

    protected $rules = [
        'horario.seg' => '',
        'horario.ter' => '',
        'horario.qua' => '',
        'horario.qui' => '',
        'horario.sex' => '',
        'horario.sab' => '',
        'horario.dom' => '',

        'horario.de' => 'required',
        'horario.ate' => 'required'
    ];

    public function mount($id = null)
    {
        $this->horario = $id ? \App\Models\Horario::find($id) : new \App\Models\Horario();
    }

    public function render()
    {
        return view('livewire.gestor.horario');
    }

    public function salvar()
    {
        $this->validate();

        $this->horario->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }
}
