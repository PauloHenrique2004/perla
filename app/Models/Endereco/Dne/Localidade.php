<?php

namespace App\Models\Endereco\Dne;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Endereco\Dne\Localidade
 *
 * @property int $LOC_NU
 * @property string $UFE_SG
 * @property string $LOC_NO
 * @property string|null $CEP
 * @property string $LOC_IN_SIT
 * @property string $LOC_IN_TIPO_LOC
 * @property int|null $LOC_NU_SUB
 * @property string|null $LOC_NO_ABREV
 * @property int|null $MUN_NU
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereCEP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCINSIT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCINTIPOLOC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCNOABREV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereLOCNUSUB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereMUNNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localidade whereUFESG($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Endereco\EnderecosAtendido[] $enderecosAtendidos
 * @property-read int|null $enderecos_atendidos_count
 */
class Localidade extends Model
{
    protected $table = 'LOG_LOCALIDADE';

    protected $primaryKey = 'LOC_NU';

    public function enderecosAtendidos()
    {
        return $this->hasMany('App\Models\Endereco\EnderecosAtendido', 'loc_nu', 'LOC_NU');
    }

    public function uf()
    {
        return $this->UFE_SG;
    }

    public function nome()
    {
        return $this->LOC_NO;
    }
}
