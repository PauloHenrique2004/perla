<?php

namespace App\Http\Livewire\Gestor\Produto;

use App\Models\ProdutoCategoria;
use App\Models\ProdutoDestaque;
use App\Models\ProdutoImagem;
use App\Util\Thumbnail\Thumbnail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Produto extends Component
{
    use WithFileUploads;

    public \App\Models\Produto\Produto $produto;
    public $categorias;
    public $foto;
    public $destaquesHome = [];

    // imagens já confirmadas para salvar
    public $uploads = [];

    // último lote selecionado no input
    public $buffer = [];

    protected $rules = [
        'produto.produto_categoria_id' => 'required',
        'produto.nome'                => 'required',
        'produto.descricao'           => '',
        'produto.preco'               => 'required',
        'produto.preco_a_partir_de'   => '',
        'produto.promocional'         => 'required',
        'produto.preco_promocional'   => '',
        'produto.ativo'               => '',
        'produto.destaque_id'         => 'nullable|exists:produto_destaques,id',
        'foto'                        => 'nullable|image|max:1024|mimes:jpeg,png',
        'buffer.*'                    => 'nullable|image|max:2048|mimes:jpeg,png',
    ];

    public function confirmarBuffer()
    {
        if (!empty($this->buffer)) {
            foreach ($this->buffer as $file) {
                $this->uploads[] = $file;
            }
            $this->buffer = [];
        }
    }


    public function mount(\App\Models\Produto\Produto $produto)
    {
        $this->produto       = $produto;
        $this->categorias    = ProdutoCategoria::all();
        $this->destaquesHome = ProdutoDestaque::orderBy('ordem')->orderBy('nome')->get();
    }

    public function render()
    {
        $galeria = $this->produto->exists
            ? $this->produto->imagens()->orderBy('id')->get()
            : collect();

        return view('livewire.gestor.produto.produto', compact('galeria'))
            ->layout('layouts.gestor.gestor');
    }

    public function salvar()
    {
        $this->salvarFoto();

        $this->validate();

        $this->produto->save();

        $this->salvarUploads();

        // limpa temporários
        $this->uploads = [];
        $this->buffer  = [];

        $this->dispatchBrowserEvent('notify', ['message' => 'Produto - Salvo com sucesso!']);
    }

    public function removerImagemGaleria($imagemId)
    {
        $imagem = ProdutoImagem::find($imagemId);

        if ($imagem && $imagem->produto_id === $this->produto->id) {
            $imagem->delete();
        }
    }

    // remove apenas preview ainda não salvo (da lista final)
    public function removerUpload($index)
    {
        unset($this->uploads[$index]);
        $this->uploads = array_values($this->uploads);
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    private function salvarFoto()
    {
        if (empty($this->foto)) {
            return;
        }

        $fileName          = $this->foto->store(\App\Models\Produto\Produto::STORAGE);
        $thumbnailFileName = Thumbnail::make($fileName, \App\Models\Produto\Produto::STORAGE);

        $this->foto = null;

        $this->produto->foto      = $fileName;
        $this->produto->thumbnail = $thumbnailFileName;
    }

    private function salvarUploads()
    {
        if (!$this->produto->exists || empty($this->uploads)) {
            return;
        }

        foreach ($this->uploads as $arquivo) {
            $path = $arquivo->store(\App\Models\Produto\Produto::STORAGE);

            ProdutoImagem::create([
                'produto_id' => $this->produto->id,
                'imagem'     => $path,
            ]);
        }
    }
}
