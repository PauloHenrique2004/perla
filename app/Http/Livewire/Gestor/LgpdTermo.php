<?php

namespace App\Http\Livewire\Gestor;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LgpdTermo extends Component
{
    public $lgpdTermo;

    protected $rules = [
        'lgpdTermo.texto' => 'required'
    ];

    public function mount($id = null)
    {
        if ($id)
            $this->lgpdTermo = \App\Models\LgpdTermo::find($id);
        else {
            $this->lgpdTermo = \App\Models\LgpdTermo::latest('id')->first();

            if ($this->lgpdTermo) {
                $lgpd = new \App\Models\LgpdTermo();
                $lgpd->setRawAttributes($this->lgpdTermo->getAttributes());
                $lgpd->id = null;

                $this->lgpdTermo = $lgpd;
            } else
                $this->lgpdTermo = new \App\Models\LgpdTermo();
        }
    }

    public function salvar()
    {
        $this->validate();

        $this->lgpdTermo->save();

        $this->dispatchBrowserEvent('notify', ['message' => '']);

        Session::flash('notify', 'Salvo com sucesso!');
        redirect(route('gestor.lgpd_termos.index'));
    }

    public function render()
    {
        return view('livewire.gestor.lgpd_termo')->layout('layouts.gestor.gestor');
    }
}