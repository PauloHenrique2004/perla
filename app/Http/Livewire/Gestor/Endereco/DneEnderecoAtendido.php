<?php

namespace App\Http\Livewire\Gestor\Endereco;

use App\Models\Endereco\EnderecosAtendido;
use Livewire\Component;

class DneEnderecoAtendido extends Component
{
    public EnderecosAtendido $enderecoAtendido;

    protected $rules = [
        'enderecoAtendido.uf' => '',
        'enderecoAtendido.loc_nu' => '',
        'enderecoAtendido.bai_nu' => '',
        'enderecoAtendido.valor' => ''
    ];

    public function mount($uf, $locNu, $baiNu = null, $enderecoAtendidoId = null)
    {
        if ($baiNu) {
            $enderecoAtendido = EnderecosAtendido::where('bai_nu', '=', $baiNu)->first();

            if ($enderecoAtendido)
                $this->enderecoAtendido = $enderecoAtendido;
            else
                $this->novoEnderecoAtendido($uf, $locNu, $baiNu);
        } else if ($enderecoAtendidoId)
            $this->enderecoAtendido = EnderecosAtendido::find($enderecoAtendidoId);
        else
            $this->novoEnderecoAtendido($uf, $locNu, $baiNu);
    }

    public function updated($name)
    {
        $this->validate();
        $this->enderecoAtendido->save();
    }

    public function remover()
    {
        $this->enderecoAtendido->delete();

        if ($this->enderecoAtendido->bai_nu)
            $this->novoEnderecoAtendido($this->enderecoAtendido->uf, $this->enderecoAtendido->loc_nu, $this->enderecoAtendido->bai_nu);
        else
            $this->emit('dneRefresh');
    }

    public function render()
    {
        return view('livewire.gestor.endereco.dne_endereco_atendido')->layout('layouts.gestor.gestor');
    }

    private function novoEnderecoAtendido($uf, $locNu, $baiNu)
    {
        $this->enderecoAtendido = new EnderecosAtendido([
            'uf' => $uf,
            'loc_nu' => $locNu,
            'bai_nu' => $baiNu,
            'valor' => 0.0
        ]);
    }
}
