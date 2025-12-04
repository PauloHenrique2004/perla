<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\LgpdTermo
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $texto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LgpdAceite[] $aceites
 * @property-read int|null $aceites_count
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo newQuery()
 * @method static \Illuminate\Database\Query\Builder|LgpdTermo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo query()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdTermo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|LgpdTermo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LgpdTermo withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LgpdAceite[] $contasAceites
 * @property-read int|null $contas_aceites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LgpdAceite[] $cookieAceites
 * @property-read int|null $cookie_aceites_count
 */
class LgpdTermo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'texto'
    ];

    public function contasAceites()
    {
        return $this->hasMany('App\Models\LgpdAceite')->whereNotNull('lgpd_aceites.user_id');
    }

    public function cookieAceites() {
        return $this->hasMany('App\Models\LgpdAceite')->whereNotNull('lgpd_aceites.cookie');
    }
}