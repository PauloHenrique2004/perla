<?php

namespace App\Http\Livewire\User;

use App\Models\Endereco\Dne\Localidade;
use App\Models\Endereco\Dne\Logradouro;
use App\Models\Endereco\Dne\UnidadeOperacional;
use App\Models\Endereco\EnderecosAtendido;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserEndereco extends Component
{
    public \App\Models\UserEndereco $endereco;

    public $municipioId;
    public $municipios = [];
    public $enderecos = [];

    protected $rules = [
        'endereco.cep' => [],
        'endereco.endereco_atendido_id' => ['required'],
        'endereco.endereco' => ['required'],
        'endereco.numero' => ['required'],
        'endereco.complemento' => []
    ];

    public function mount(\App\Models\UserEndereco $endereco)
    {
        $this->endereco = $endereco;

        $this->municipios = EnderecosAtendido::municipios()->get();
        $this->obterEnderecosAtendidos();
    }

    public function render()
    {
        return view('livewire.user.user_endereco');
    }

    public function salvar()
    {
        $this->validate();

        unset($this->endereco['cep']);

        $usuario = \Auth::user();
        $usuario->enderecos()->save($this->endereco);

        if (Session::exists('url.intended')) {
            Session::flash('notify', 'Salvo com sucesso');
            redirect(Session::remove('url.intended'));
        } else
            $this->dispatchBrowserEvent('notify', ['message' => 'Salvo com sucesso!']);
    }

    public function updated($name)
    {
        if ($name == 'municipioId')
            $this->obterEnderecosAtendidos();

        if ($name == 'endereco.cep')
            $this->localizarCep();

        $this->validateOnly($name);
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        parent::validate(
            $rules,
            [],
            [
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
        $this->dispatchBrowserEvent('notify', ['type' => 'info', 'message' => 'Localidade não atendida']);
        $this->endereco->cep = '';
    }

    private function recarregarEnderecosAtendidos()
    {
        $this->endereco->endereco_atendido_id = null;
        $this->obterEnderecosAtendidos();
    }

    private function obterEnderecosAtendidos()
    {
        $this->enderecos = EnderecosAtendido::where('loc_nu', '=', $this->municipioId)->get();
    }
}
