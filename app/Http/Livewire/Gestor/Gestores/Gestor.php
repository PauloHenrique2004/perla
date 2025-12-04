<?php

namespace App\Http\Livewire\Gestor\Gestores;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Gestor extends Component
{
    public $gestor;
    public $nome;
    public $email;
    public $senha;

    public function mount($id = null)
    {
        $this->gestor = $id ? \App\Models\Gestor::find($id) : new \App\Models\Gestor();
        $this->nome = $this->gestor->name;
        $this->email = $this->gestor->email;
    }

    public function render()
    {
        return view('livewire.gestor.gestores.gestor');
    }

    public function salvar()
    {
        $this->validar();

        $atributos = $this->atributos();

        if (!$this->gestor->id) {
            $this->gestor = $this->gestor->create($atributos);
        } else
            $this->gestor->update($atributos);

        $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    private function validar()
    {
        $this->validate(
            [
                'nome' => 'required',
                'email' => [
                    Rule::unique('users')->ignore($this->gestor->id),
                    Rule::requiredIf(function () {
                        return !$this->gestor->id;
                    })
                ]
            ]
        );
    }

    private function atributos()
    {
        return [
            'name' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->senha)
        ];
    }
}
