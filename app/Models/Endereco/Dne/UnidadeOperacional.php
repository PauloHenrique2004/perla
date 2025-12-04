<?php

namespace App\Models\Endereco\Dne;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Endereco\Dne\UnidadeOperacional
 *
 * @property int $UOP_NU
 * @property string $UFE_SG
 * @property int $LOC_NU
 * @property int $BAI_NU
 * @property int|null $LOG_NU
 * @property string $UOP_NO
 * @property string $UOP_ENDERECO
 * @property string $CEP
 * @property string $UOP_IN_CP
 * @property string|null $UOP_NO_ABREV
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereBAINU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereCEP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereLOCNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereLOGNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUFESG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUOPENDERECO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUOPINCP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUOPNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUOPNOABREV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnidadeOperacional whereUOPNU($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Endereco\Dne\Logradouro|null $logradouro
 */
class UnidadeOperacional extends Model
{
    protected $table = 'LOG_UNID_OPER';

    protected $primaryKey = 'UOP_NU';

    public function logradouro()
    {
        return $this->belongsTo('App\Models\Endereco\Dne\Logradouro', 'LOG_NU', 'LOG_NU');
    }
}
