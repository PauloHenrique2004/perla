<?php

namespace App\Http\Livewire;

use App\Models\PaginaCategoria;
use App\Util\Resize\Resize;
use App\Util\Thumbnail\Thumbnail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pagina extends Component
{
    use WithFileUploads;

    public $pagina;
    public $foto;
    public $titulo;
    public $conteudo;
    public $categoriaId;
    public $categorias;

    public function save()
    {
        $this->salvar();
    }

    public function mount($id = null)
    {
        $this->categorias = PaginaCategoria::masterCategorias()->select(['id', 'nome'])->get();

        $this->pagina = $id ? \App\Models\Pagina::find($id) : new \App\Models\Pagina();
        $this->categoriaId = $this->pagina->categoria_id;
        $this->titulo = $this->pagina->titulo;
        $this->conteudo = $this->pagina->conteudo;

        // Se não tiver categoria selecionada obtem a primeira categoria que tiver disponivel
        if (!$id && !$this->categoriaId)
            $this->categoriaId = PaginaCategoria::categorias()->select('id')->first()->id;
    }

    public function updatedFoto()
    {
        $this->validate([
            'foto' => 'image|max:5120|mimes:jpeg,png'
        ]);
    }

    public function render()
    {
        return view('livewire.pagina');
    }

    private function salvar()
    {
        $this->validar();

        $atributos = $this->atributos();

        if (!empty($this->foto))
            $atributos = array_merge($atributos, $this->salvarFoto());

        if (!$this->pagina->id) {
            $this->pagina = $this->pagina->create($atributos);
        } else
            $this->pagina->update($atributos);

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    private function salvarFoto()
    {
        $storage = 'storage_paginas';
        $fileName = $this->foto->store($storage);
        Resize::make($fileName);

        $thumbnailFileName = Thumbnail::make($fileName, $storage);

        $this->foto = null;

        return [
            'foto' => $fileName,
            'thumbnail' => $thumbnailFileName
        ];
    }

    private function validar()
    {
        $this->validate(
            [
                'titulo' => 'required',
                'categoriaId' => 'required'
            ],
            null,
            [
                'categoriaId' => 'Categoria'
            ]
        );
    }

    private function atributos()
    {
        return [
            'categoria_id' => $this->categoriaId,
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo
        ];
    }
}
