<?php

namespace App\Models\Endereco\Dne;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Endereco\Dne\Logradouro
 *
 * @property int $LOG_NU
 * @property string $UFE_SG
 * @property int $LOC_NU
 * @property int|null $BAI_NU_INI
 * @property int|null $BAI_NU_FIM
 * @property string $LOG_NO
 * @property string|null $LOG_COMPLEMENTO
 * @property string $CEP
 * @property string $TLO_TX
 * @property string|null $LOG_STA_TLO
 * @property string|null $LOG_NO_ABREV
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereBAINUFIM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereBAINUINI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereCEP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOCNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOGCOMPLEMENTO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOGNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOGNOABREV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOGNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereLOGSTATLO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereTLOTX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereUFESG($value)
 * @mixin \Eloquent
 */
class Logradouro extends Model
{
    protected $table = 'LOG_LOGRADOURO';

    protected $primaryKey = 'LOG_NU';

    public function completo()
    {
        return $this->TLO_TX . ' ' . $this->LOG_NO;
    }
}
