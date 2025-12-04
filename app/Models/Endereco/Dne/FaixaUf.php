<?php

namespace App\Models\Endereco\Dne;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Endereco\Dne\FaixaUf
 *
 * @property string $UFE_SG
 * @property string $UFE_CEP_INI
 * @property string $UFE_CEP_FIM
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf whereUFECEPFIM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf whereUFECEPINI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaixaUf whereUFESG($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Endereco\EnderecosAtendido[] $enderecosAtendidos
 * @property-read int|null $enderecos_atendidos_count
 */
class FaixaUf extends Model
{
    protected $table = 'LOG_FAIXA_UF';

    protected $primaryKey = 'UFE_SG';

    protected $keyType = 'string';

    public function enderecosAtendidos()
    {
        return $this->hasMany('App\Models\Endereco\EnderecosAtendido', 'uf', 'UFE_SG');
    }
}
