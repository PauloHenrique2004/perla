<?php

namespace App\Models\Endereco\Dne;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Endereco\Dne\Bairro
 *
 * @property int $BAI_NU
 * @property string $UFE_SG
 * @property int $LOC_NU
 * @property string $BAI_NO
 * @property string|null $BAI_NO_ABREV
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereBAINO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereBAINOABREV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereBAINU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereLOCNU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereUFESG($value)
 * @mixin \Eloquent
 */
class Bairro extends Model
{
    protected $table = 'LOG_BAIRRO';

    protected $primaryKey = 'BAI_NU';

    public function nome()
    {
        return $this->BAI_NO;
    }

    public function uuid()
    {
        return (string)Str::uuid();
    }
}
