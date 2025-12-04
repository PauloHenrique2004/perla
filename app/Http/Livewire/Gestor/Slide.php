<?php

namespace App\Http\Livewire\Gestor;

use App\Util\Resize\Resize;
use App\Util\Thumbnail\Thumbnail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Slide extends Component
{
    use WithFileUploads;

    public $slide;
    public $ordem;
    public $promocional;
    public $tag;
    public $titulo;
    public $subtitulo;
    public $link;
    public $foto;

    public function save()
    {
        $this->salvar();
    }

    public function mount($id = null)
    {
        $this->slide = $id ? \App\Models\Slide::find($id) : new \App\Models\Slide();

        $this->ordem = $this->slide->ordem;
        $this->promocional = $this->slide->promocional;
        $this->tag = $this->slide->tag;
        $this->titulo = $this->slide->titulo;
        $this->subtitulo = $this->slide->subtitulo;
        $this->link = $this->slide->link;
    }

    public function updatedFoto()
    {
        $this->validate([
            'foto' => 'image|max:512|mimes:jpeg,png'
        ]);
    }

    public function render()
    {
        return view('livewire.gestor.slide');
    }

    private function salvar()
    {
        $this->validar();

        $atributos = $this->atributos();

        if (!empty($this->foto))
            $atributos = array_merge($atributos, $this->salvarFoto());

        if (!$this->slide->id) {
            $this->slide = $this->slide->create($atributos);
        } else
            $this->slide->update($atributos);

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    private function salvarFoto()
    {
        $fileName = $this->foto->store(\App\Models\Slide::STORAGE);
        Resize::make($fileName, 600);

        $this->foto = null;

        return [
            'foto' => $fileName,
        ];
    }

    private function validar()
    {
        $this->validate(
            [
                'titulo' => 'required',
                'foto' => [
                    Rule::requiredIf(function () {
                        return !$this->slide->id;
                    })
                ]
            ]
        );
    }

    private function atributos()
    {
        return [
            'ordem' => empty($this->ordem) ? null : $this->ordem,
            'promocional' => $this->promocional,
            'tag' => $this->tag,
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'link' => $this->link
        ];
    }
}
