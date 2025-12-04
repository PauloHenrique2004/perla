<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class LgpdAceite extends Component
{
    public $lgpdAceite;
    public $usuarioAtualAceitouAlgumTermoAnterior;

    public function mount()
    {
        $this->lgpdAceite = \App\Models\LgpdAceite::aceiteAtual();
        $this->usuarioAtualAceitouAlgumTermoAnterior = \App\Models\LgpdAceite::usuarioAtualAceitouAlgumTermoAnterior();
    }

    public function aceitar()
    {
        $this->lgpdAceite = \App\Models\LgpdAceite::aceitar(\Auth::user() ? \Auth::user()->id : null);
    }

    public function render()
    {
        return view('livewire.site.lgpd_aceite');
    }
}