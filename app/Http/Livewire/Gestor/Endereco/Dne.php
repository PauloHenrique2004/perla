<?php

namespace App\Http\Livewire\Gestor\Endereco;

use App\Models\Endereco\Dne\Bairro;
use App\Models\Endereco\Dne\FaixaUf;
use App\Models\Endereco\Dne\Localidade;
use App\Models\Endereco\EnderecosAtendido;
use Livewire\Component;
use Livewire\WithPagination;

class Dne extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $faixaUfs;
    public $ufeSg;

    private $municipios;
    public $locNu;

    private $bairros;
    public $bairrosEnderecoAtendidos;

    public $query = '';
    public $bairroCustom = '';

    public $tipoVisualizacao = 'uf';
    public $tipoVisualizacaoHistorico = [];

    protected $listeners = ['dneRefresh'];

    public function mount()
    {
    }

    public function updated($name)
    {
        if ($name == 'query')
            $this->resetPage();
    }

    public function render()
    {
        $this->dneRefresh();

        return view('livewire.gestor.endereco.dne', [
            'bairros' => $this->bairros,
            'municipios' => $this->municipios
        ])->layout('layouts.gestor.gestor');
    }

    public function dneRefresh()
    {
        if ($this->tipoVisualizacao == 'uf')
            $this->obterUfs();
        elseif ($this->tipoVisualizacao == 'municipio')
            $this->obterMunicipios();
        elseif ($this->tipoVisualizacao == 'bairro')
            $this->obterBairros();
    }

    public function voltar()
    {
        $this->tipoVisualizacao = array_pop($this->tipoVisualizacaoHistorico);

        $this->query = '';

        if ($this->tipoVisualizacao == 'uf' || $this->tipoVisualizacao == 'bairro')
            $this->resetPage();

        if ($this->tipoVisualizacao == 'uf')
            $this->obterUfs();
        else if ($this->tipoVisualizacao == 'municipio')
            $this->obterMunicipios();
    }

    public function alterarTipoMunicipios($ufeSg)
    {
        $this->tipoVisualizacaoHistorico[] = $this->tipoVisualizacao;
        $this->tipoVisualizacao = 'municipio';

        $this->ufeSg = $ufeSg;
        $this->query = '';

        $this->obterMunicipios();
    }

    public function alterarTipoBairros($locNu)
    {
        $this->tipoVisualizacaoHistorico[] = $this->tipoVisualizacao;
        $this->tipoVisualizacao = 'bairro';

        $this->locNu = $locNu;
        $this->query = '';

        $this->obterBairros();
    }

    public function cadastrarBairroCustom()
    {
        if (empty($this->bairroCustom))
            return;

        $bairro = new EnderecosAtendido([
            'uf' => $this->ufeSg,
            'loc_nu' => $this->locNu,
            'bairro_custom' => $this->bairroCustom
        ]);

        $bairro->saveOrFail();

        $this->bairroCustom = '';

        $this->obterBairros();
    }

    private function obterUfs()
    {
        $this->faixaUfs = FaixaUf::where('UFE_SG', 'LIKE', "%$this->query%")->get();
    }

    private function obterMunicipios()
    {
        $this->municipios = Localidade
            ::where('UFE_SG', '=', $this->ufeSg)
            ->where('LOC_NO', 'like', "%{$this->query}%")
            ->leftJoin('enderecos_atendidos', 'LOG_LOCALIDADE.LOC_NU', '=', 'enderecos_atendidos.loc_nu')
            ->selectRaw('LOG_LOCALIDADE.*, COUNT(enderecos_atendidos.loc_nu) AS enderecos_atendidos_qtd')
            ->groupBy(
                'LOG_LOCALIDADE.LOC_NU', 'LOG_LOCALIDADE.UFE_SG', 'LOG_LOCALIDADE.LOC_NO',
                'LOG_LOCALIDADE.CEP', 'LOG_LOCALIDADE.LOC_IN_SIT', 'LOG_LOCALIDADE.LOC_IN_TIPO_LOC',
                'LOG_LOCALIDADE.LOC_NU_SUB', 'LOG_LOCALIDADE.LOC_NO_ABREV', 'LOG_LOCALIDADE.MUN_NU'
            )
            ->orderBy('enderecos_atendidos_qtd', 'DESC')
            ->orderBy('LOC_NO', 'ASC')
            ->paginate(30);
    }

    private function obterBairros()
    {
        $this->bairros = Bairro::where('LOG_BAIRRO.LOC_NU', '=', $this->locNu);

        $this->bairrosEnderecoAtendidos = EnderecosAtendido::where('loc_nu', '=', $this->locNu)->whereNull('bai_nu');

        if (!empty($this->query)) {
            $this->bairros->where('BAI_NO', 'like', "%{$this->query}%");
            $this->bairrosEnderecoAtendidos->where('bairro_custom', 'like', "%{$this->query}%");
        }

        $this->bairros = $this->bairros
            ->leftJoin('enderecos_atendidos', 'LOG_BAIRRO.BAI_NU', '=', 'enderecos_atendidos.bai_nu')
            ->selectRaw('LOG_BAIRRO.*, COUNT(enderecos_atendidos.loc_nu) AS enderecos_atendidos_qtd')
            ->groupBy(
                'LOG_BAIRRO.LOC_NU', 'LOG_BAIRRO.BAI_NU', 'LOG_BAIRRO.UFE_SG',
                'LOG_BAIRRO.BAI_NO', 'LOG_BAIRRO.BAI_NO_ABREV'
            )
            ->orderBy('enderecos_atendidos_qtd', 'DESC')
            ->orderBy('LOG_BAIRRO.BAI_NO', 'ASC')
            ->paginate(30);

        $this->bairrosEnderecoAtendidos = $this->bairrosEnderecoAtendidos->get();
    }
}
