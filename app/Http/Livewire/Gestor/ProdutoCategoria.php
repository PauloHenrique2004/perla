<?php

namespace App\Http\Livewire\Gestor;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProdutoCategoria extends Component
{
    use WithFileUploads;

    public $categoria;
    public $nome;
    public $icone;

    public $exibir_topo = false;

    public $subcategorias = [];

    // para adicionar nova subcategoria (linha ocultável)
    public $showNovaLinha = false;
    public $nova_sub = [
        'produto_subcategoria' => '',
        'ordem' => 0,
    ];

    // edição inline
    public $editIndex = null;
    public $editar_sub = [
        'produto_subcategoria' => '',
        'ordem' => 0,
    ];

    public function mount($id = null)
    {
        $this->categoria = $id
            ? \App\Models\ProdutoCategoria::find($id)
            : new \App\Models\ProdutoCategoria();

        $this->nome = $this->categoria->nome;
        $this->exibir_topo = (bool) ($this->categoria->exibir_topo ?? false);

        if ($this->categoria->id) {
            $this->subcategorias = $this->categoria->subcategorias()
                ->orderBy('ordem')
                ->get(['id','produto_subcategoria','ordem'])
                ->toArray();
        }
    }

    public function render()
    {
        return view('livewire.gestor.produto_categoria');
    }

    /* ----------------------------
       Categoria: salvar básico
    ---------------------------- */
    public function save()
    {
        $this->validate([
            'nome' => 'required',
            'icone' => 'nullable|image|max:512|mimes:jpeg,png',
        ]);

        $data = [
            'nome' => $this->nome,
            'exibir_topo' => $this->exibir_topo ? 1 : 0,
        ];

        if (!empty($this->icone)) {
            $file = $this->icone->store(\App\Models\ProdutoCategoria::STORAGE);
            $data['icone'] = $file;
            $this->icone = null;
        }

        if (!$this->categoria->id) {
            $this->categoria = $this->categoria->create($data);
        } else {
            $this->categoria->update($data);
        }

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    /* ----------------------------
       Subcategorias: adicionar / confirmar
    ---------------------------- */

    public function mostrarNovaLinha()
    {
        $this->showNovaLinha = true;
    }

    public function confirmarNovaSubcategoria()
    {
        if (!trim($this->nova_sub['produto_subcategoria'])) {
            $this->dispatchBrowserEvent('notify', ['message' => 'Digite o nome da subcategoria.']);
            return;
        }

        $this->subcategorias[] = [
            'id' => null,
            'produto_subcategoria' => $this->nova_sub['produto_subcategoria'],
            'ordem' => $this->nova_sub['ordem'] ?? 0,
        ];

        // limpa e esconde
        $this->nova_sub = ['produto_subcategoria' => '', 'ordem' => 0];
        $this->showNovaLinha = false;
    }

    /* ----------------------------
       Subcategorias: edição inline
    ---------------------------- */




    /* ----------------------------
       Subcategorias: salvar / remover
    ---------------------------- */

    public function salvarSubcategorias()
    {
        if (!$this->categoria->id) {
            $this->dispatchBrowserEvent('notify', ['message' => 'Salve a categoria antes de salvar subcategorias.']);
            return;
        }

        foreach ($this->subcategorias as $k => $sub) {
            if (!trim($sub['produto_subcategoria'] ?? '')) {
                continue;
            }

            if (!empty($sub['id'])) {
                \App\Models\ProdutoSubCategoria::where('id', $sub['id'])->update([
                    'produto_subcategoria' => $sub['produto_subcategoria'],
                    'ordem' => $sub['ordem'] ?? 0,
                ]);
            } else {
                $novo = $this->categoria->subcategorias()->create([
                    'produto_subcategoria' => $sub['produto_subcategoria'],
                    'ordem' => $sub['ordem'] ?? 0,
                ]);
                // atualiza id local para evitar duplicação
                $this->subcategorias[$k]['id'] = $novo->id;
            }
        }

        // recarrega
        $this->subcategorias = $this->categoria->subcategorias()
            ->orderBy('ordem')
            ->get(['id','produto_subcategoria','ordem'])
            ->toArray();

        $this->dispatchBrowserEvent('notify', ['message' => 'Subcategorias salvas com sucesso!']);
    }

    public function removerSubcategoria($id)
    {
        if (!$this->categoria->id) {
            // remover local apenas (se ainda não salvo)
            $this->subcategorias = array_values(array_filter(
                $this->subcategorias,
                fn($s) => ($s['id'] ?? null) !== $id
            ));
            return;
        }

        $this->categoria->subcategorias()->where('id', $id)->delete();

        $this->subcategorias = array_values(array_filter(
            $this->subcategorias,
            fn($s) => ($s['id'] ?? null) !== $id
        ));

        $this->dispatchBrowserEvent('notify', ['message' => 'Subcategoria removida.']);
    }
}
