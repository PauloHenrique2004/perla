<?php

namespace App\Http\Livewire\Gestor;

use App\Util\Resize\Resize;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProdutoCategoria extends Component
{
    use WithFileUploads;

    public $categoria;
    public $nome;
    public $icone;

    // novos campos de menu
    public $menu_grupo = '';
    public $menu_subgrupo = '';

    public function save()
    {
        $this->salvar();
    }

    public function mount($id = null)
    {
        $this->categoria = $id
            ? \App\Models\ProdutoCategoria::find($id)
            : new \App\Models\ProdutoCategoria();

        $this->nome = $this->categoria->nome;

        // carrega valores existentes (edição)
        $this->menu_grupo    = $this->categoria->menu_grupo ?? '';
        $this->menu_subgrupo = $this->categoria->menu_subgrupo ?? '';
    }

    public function updatedIcone()
    {
        $this->validate([
            'icone' => 'image|max:512|mimes:jpeg,png'
        ]);
    }

    public function render()
    {
        return view('livewire.gestor.produto_categoria');
    }

    private function salvar()
    {
        $this->validar();

        $atributos = $this->atributos();

        if (!empty($this->icone)) {
            $atributos = array_merge($atributos, $this->salvarIcone());
        }

        if (!$this->categoria->id) {
            $this->categoria = $this->categoria->create($atributos);
        } else {
            $this->categoria->update($atributos);
        }

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    private function salvarIcone()
    {
        $fileName = $this->icone->store(\App\Models\ProdutoCategoria::STORAGE);

        $this->icone = null;

        return [
            'icone' => $fileName,
        ];
    }

    private function validar()
    {
        $this->validate([
            'nome' => 'required',
            'icone' => 'nullable|image|max:512|mimes:jpeg,png',
            // se quiser validar o menu_grupo:
            // 'menu_grupo' => 'nullable|in:kits,linhas,produtos,cabelos',
        ]);
    }

    private function atributos()
    {
        return [
            'nome'          => $this->nome,
            'menu_grupo'    => $this->menu_grupo ?: null,
            'menu_subgrupo' => $this->menu_subgrupo ?: null,
        ];
    }
}
