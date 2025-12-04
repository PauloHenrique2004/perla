<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FormaPagamento
 *
 * @property int $id
 * @property string $nome
 * @property int $pode_apagar
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereInformarEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|FormaPagamento onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaPagamento wherePodeApagar($value)
 * @method static \Illuminate\Database\Query\Builder|FormaPagamento withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FormaPagamento withoutTrashed()
 */
class FormaPagamento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];

    public static function buscaNome($nome)
    {
        return $nome ? self::where('nome', 'LIKE', "$nome%") : self::where([]);
    }
}
