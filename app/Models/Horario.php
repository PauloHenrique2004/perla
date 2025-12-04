<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Horario
 *
 * @property int $id
 * @property string $nome
 * @property string $slug
 * @property string $de
 * @property string $ate
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario nome($nome)
 * @method static \Illuminate\Database\Query\Builder|Horario onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereAte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereDe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Horario withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Horario withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cardapio[] $cardapios
 * @property-read int|null $cardapios_count
 * @property int|null $seg
 * @property int|null $ter
 * @property int|null $qua
 * @property int|null $qui
 * @property int|null $sex
 * @property int|null $sab
 * @property int|null $dom
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereDom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereQua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereQui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereSab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereSeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereTer($value)
 */
class Horario extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'seg', 'ter', 'qua', 'qui', 'sex', 'sab', 'dom', 'de', 'ate'
    ];

    public static function lojaAberta()
    {
        $today = Carbon::now();

        switch ($today->weekday()) {
            case 0:
                $diaSemana = 'dom';
                break;
            case 1:
                $diaSemana = 'seg';
                break;
            case 2:
                $diaSemana = 'ter';
                break;
            case 3:
                $diaSemana = 'qua';
                break;
            case 4:
                $diaSemana = 'qui';
                break;
            case 5:
                $diaSemana = 'sex';
                break;
            default:
                $diaSemana = 'sab';
                break;
        }

        return self::where($diaSemana, '=', true)
            ->whereRaw('? BETWEEN de and ate', [$today->format('H:m')])->exists();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $nome
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNome($query, $nome)
    {
        return $nome ? $query->where('nome', 'LIKE', "$nome%") : $query->where([]);
    }

    public function cardapios()
    {
        return $this->hasMany('App\Models\Cardapio')->orderBy('id', 'desc');
    }
}
