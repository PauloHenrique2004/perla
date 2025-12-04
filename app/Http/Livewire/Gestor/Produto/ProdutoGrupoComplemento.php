<?php

namespace App\Http\Livewire\Gestor\Produto;

use Livewire\Component;

class ProdutoGrupoComplemento extends Component
{
    public \App\Models\Produto\ProdutoGrupoComplemento $complemento;
    public $index;

    protected $listeners = ['salvar'];

    protected $rules = [
        'complemento.produto_grupo_id' => 'required',
        'complemento.nome' => 'required',
        'complemento.preco' => '',
        'complemento.descricao' => ''
    ];

    public function mount(\App\Models\Produto\ProdutoGrupoComplemento $complemento, $index)
    {
        $this->complemento = $complemento;
        $this->index = $index;
    }

    public function render()
    {
        return view('livewire.gestor.produto.produto_grupo_complemento');
    }

    public function salvar()
    {
        if($this->complemento->isClean())
            return;

        $this->validate();

        $this->complemento->save();

        $this->dispatchBrowserEvent('notify', ['message' => 'Complemento - Salvo com sucesso!']);
    }

    public function updated($name)
    {
        $this->validateOnly($name);

        $this->emit('syncComplemento', $this->complemento, $this->index);
    }

    public function remover()
    {
        if ($this->complemento->exists)
            $this->complemento->delete();

        $this->emit('syncComplemento', $this->complemento, $this->index, true);

        $this->dispatchBrowserEvent('notify', ['message' => 'Complemento - Removido com sucesso!']);
    }
}
