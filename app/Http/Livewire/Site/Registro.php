<?php

namespace App\Http\Livewire\Site;

use App\Models\Endereco\Dne\Localidade;
use App\Models\Endereco\Dne\Logradouro;
use App\Models\Endereco\Dne\UnidadeOperacional;
use App\Models\Endereco\EnderecosAtendido;
use App\Models\LgpdTermo;
use App\Models\User;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Registro extends Component
{
    public \App\Models\User $usuario;
    public \App\Models\UserEndereco $endereco;

    public $municipioId;
    public $municipios = [];
    public $enderecos = [];
    public $termos;

    public $senha;
    public $senha_confirmation;

    protected $rules = [
        'usuario.name' => ['required', 'string', 'max:255'],
        'usuario.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'usuario.telefone' => ['required'],
        'senha' => ['required', 'string', 'min:8', 'confirmed'],
        'senha_confirmation' => '',

        'municipioId' => ['required'],

        'endereco.cep' => [],
        'endereco.endereco_atendido_id' => ['required'],
        'endereco.endereco' => ['required'],
        'endereco.numero' => ['required'],
        'endereco.complemento' => []
    ];

    public function mount()
    {
        $this->usuario = new User();
        $this->endereco = new UserEndereco();

        $this->municipios = EnderecosAtendido::municipios()->get();
        $this->termos = LgpdTermo::latest('id')->first();
    }

    public function render()
    {
        \App\Models\LgpdAceite::aceitar($this->usuario->id);
        return view('livewire.site.registro');
    }

    public function salvar()
    {
        $this->validate();

        DB::transaction(function () {
            $this->usuario->password = Hash::make($this->senha);
            $this->usuario->save();

            unset($this->endereco['cep']);
            $this->usuario->enderecos()->save($this->endereco);
        });

        Auth::guard('web')->login($this->usuario);

        Session::flash('notify', 'Salvo com sucesso');

        if (Session::exists('url.intended'))
            redirect(Session::remove('url.intended'));
        else
            redirect('/');
    }

    public function updated($name)
    {
        if ($name == 'municipioId')
            $this->recarregarEnderecosAtendidos();

        if ($name == 'endereco.cep')
            $this->localizarCep();

        if ($name == 'senha')
            return;

        $this->validateOnly($name);
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        parent::validate(
            $rules,
            [],
            [
                'usuario.name' => 'Nome',
                'usuario.email' => 'E-mail',
                'senha' => 'Senha',
                'senha_confirmation' => 'Confirmação de Senha',

                'municipioId' => 'Município',

                'endereco.cep' => 'CEP',
                'endereco.endereco_atendido_id' => 'Bairro',
                'endereco.endereco' => 'Endereço',
                'endereco.numero' => 'Número'
            ]
        );
    }

    private function localizarCep()
    {
        $this->endereco->cep = preg_replace('/[^0-9]/', '', $this->endereco->cep);

        $this->municipioId = null;
        $this->endereco->endereco_atendido_id = null;
        $this->endereco->endereco = null;
        $this->endereco->numero = null;

        if (strlen($this->endereco->cep) == 8) {
            // Verificando primeiramente se o CEP é válido/existe
            $localidadeExiste = Localidade::where('CEP', '=', $this->endereco->cep)->exists();
            $logradouroExiste = Logradouro::where('CEP', '=', $this->endereco->cep)->exists();
            $unidadeOperacionalExiste = UnidadeOperacional::where('CEP', '=', $this->endereco->cep)->exists();

            if ($localidadeExiste || $logradouroExiste || $unidadeOperacionalExiste) {
                $this->localizarCepPorLogradouro($this->endereco->cep);
            } else {
                $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'CEP inválido']);
            }
        }
    }

    // Tenta localizar se o endereço é atenido utilizando a tabela logradouro, se sim, obtém o bairro e nome do logradouro
    private function localizarCepPorLogradouro($cep)
    {
        $logradouro = Logradouro::where('CEP', '=', $cep)->first();

        if (!$logradouro) {
            $unidadeOperacional = UnidadeOperacional::where('CEP', '=', $cep)->first();

            if ($unidadeOperacional)
                $logradouro = $unidadeOperacional->logradouro;
        }

        if ($logradouro) {
            $enderecoAtendido = EnderecosAtendido::where('bai_nu', '=', $logradouro->BAI_NU_INI)->first();

            if ($enderecoAtendido) {
                $this->municipioId = $logradouro->LOC_NU;
                $this->recarregarEnderecosAtendidos();

                $this->endereco->endereco_atendido_id = $enderecoAtendido->id;
                $this->endereco->endereco = $logradouro->completo();
            } else
                $this->informarLocalidadeNaoAtendida();
        } else {
            // Caso não localize, verifica se ao menos o municipio é atendido
            $this->localizarCepPorMunicipio($cep);
        }
    }

    private function localizarCepPorMunicipio($cep)
    {
        $localidade = Localidade::where('CEP', '=', $cep)->first();

        if ($localidade) {
            $localidadeAtendida = EnderecosAtendido::where('loc_nu', '=', $localidade->LOC_NU)->exists();

            if ($localidadeAtendida) {
                $this->municipioId = $localidade->LOC_NU;
                $this->recarregarEnderecosAtendidos();
            } else
                $this->informarLocalidadeNaoAtendida();
        }
    }

    private function informarLocalidadeNaoAtendida()
    {
        $this->dispatchBrowserEvent('notify', ['type' => 'info', 'message' => 'Oi! Olha, infelizmente ainda não estamos entregando na sua região.', 'timeout' => 5000]);
        $this->endereco->cep = '';
    }

    private function recarregarEnderecosAtendidos()
    {
        $this->endereco->endereco_atendido_id = null;
        $this->enderecos = EnderecosAtendido::where('loc_nu', '=', $this->municipioId)->get();
    }
}
