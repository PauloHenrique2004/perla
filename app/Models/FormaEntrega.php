<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FormaEntrega
 *
 * @property int $id
 * @property string $nome
 * @property int $informar_endereco
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereInformarEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormaEntrega whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|FormaEntrega onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|FormaEntrega withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FormaEntrega withoutTrashed()
 */
class FormaEntrega extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'informar_endereco'
    ];

    public static function buscaNome($nome)
    {
        return $nome ? self::where('nome', 'LIKE', "$nome%") : self::where([]);
    }
}
