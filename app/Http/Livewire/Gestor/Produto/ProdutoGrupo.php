<?php

namespace App\Http\Livewire\Gestor\Produto;

use App\Models\Produto\ProdutoGrupoComplemento;
use Livewire\Component;

class ProdutoGrupo extends Component
{
    public \App\Models\Produto\Produto $produto;
    public \App\Models\Produto\ProdutoGrupo $grupo;

    public $complementos = [];
    protected $listeners = ['syncComplemento'];

    protected $rules = [
        'grupo.produto_id' => 'required',
        'grupo.nome' => 'required',
        'grupo.ordem' => '',
        'grupo.tipo' => '',
        'grupo.quantidade_minima' => ['required'],
        'grupo.quantidade_maxima' => 'required'
    ];

    public function mount(\App\Models\Produto\Produto $produto, \App\Models\Produto\ProdutoGrupo $grupo)
    {
        $this->produto = $produto;

        if (!$grupo->exists) {
            $grupo->tipo = 1;
            $grupo->produto_id = $produto->id;
        }

        $this->grupo = $grupo;

        $this->mountComplemento();
    }

    public function render()
    {
        return view('livewire.gestor.produto.produto_grupo')->layout('layouts.gestor.gestor');
    }

    public function salvar()
    {
        $this->validate();

        $this->grupo->save();

        // Se existir formulário aninhado, os filhos irão salvar.
        $this->emit('salvar');

        $this->dispatchBrowserEvent('notify', ['message' => 'Produto - Salvo com sucesso!']);
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function mountComplemento()
    {
        if ($this->grupo->complementos()->count() > 0)
            foreach ($this->grupo->complementos as $complemento)
                $this->complementos[] = $complemento;
    }

    public function addComplemento()
    {
        $complemento = new ProdutoGrupoComplemento();
        $complemento->produto_grupo_id = $this->grupo->id;
        $this->complementos[] = $complemento;
    }

    /**
     * @param $complemento ProdutoGrupoComplemento
     * @param $index integer
     * @param $unset boolean
     */
    public function syncComplemento($complemento, $index, $unset = false)
    {
        if ($unset)
            unset($this->complementos[$index]);
        else
            $this->complementos[$index] = $complemento;
    }
}
