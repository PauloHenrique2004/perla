<?php

namespace App\Http\Livewire\Gestor\Usuario;

use App\Models\User;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Usuario extends Component
{
    public User $usuario;
    public $nome;
    public $telefone;
    public $email;
    public $senha;
    public $enderecos = [];

    protected $listeners = ['syncEndereco'];

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
        $this->nome = $this->usuario->name;
        $this->telefone = $this->usuario->telefone;
        $this->email = $this->usuario->email;

        if ($this->usuario->enderecos()->count() > 0)
            foreach ($this->usuario->enderecos as $endereco)
                array_push($this->enderecos, $endereco);
    }

    public function render()
    {
        return view('livewire.gestor.usuario.usuario')->layout('layouts.gestor.gestor');
    }

    public function addEndereco()
    {
        $endereco = new UserEndereco();
        $endereco->user_id = $this->usuario->id;
        array_push($this->enderecos, $endereco);
    }

    /**
     * @param $endereco UserEndereco
     * @param $index integer
     * @param $unset boolean
     */
    public function syncEndereco($endereco, $index, $unset = false)
    {
        if ($unset)
            unset($this->enderecos[$index]);
        else
            $this->enderecos[$index] = $endereco;
    }

    public function salvar()
    {
        $this->validar();

        $atributos = $this->atributos();

        if (!$this->usuario->id) {
            $this->usuario = $this->usuario->create($atributos);
        } else
            $this->usuario->update($atributos);

        // Se existir formulário aninhado, os filhos iram salvar.
        $this->emit('salvar');

        $this->dispatchBrowserEvent('notify', ['message' => 'Usuário - Salvo com sucesso!']);
    }

    private function validar()
    {
        $this->validate(
            [
                'nome' => 'required',
                'email' => [
                    Rule::unique('users')->ignore($this->usuario->id),
                    Rule::requiredIf(function () {
                        return !$this->usuario->id;
                    })
                ]
            ]
        );
    }

    private function atributos()
    {
        return [
            'name' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'password' => Hash::make($this->senha)
        ];
    }
}
