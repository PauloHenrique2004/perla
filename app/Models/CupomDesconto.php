<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CupomDesconto
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto newQuery()
 * @method static \Illuminate\Database\Query\Builder|CupomDesconto onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto query()
 * @method static \Illuminate\Database\Query\Builder|CupomDesconto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CupomDesconto withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int $qtd_uso_maxima
 * @property int $qtd_utilizado
 * @property \Illuminate\Support\Carbon $validade
 * @property string $valor
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereQtdUsoMaxima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereQtdUtilizado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereValidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereValor($value)
 * @property string $codigo
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto valido()
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto codigo($codigo)
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto buscaCodigo($codigo)
 * @property string $valor_minimo_pedido
 * @method static \Illuminate\Database\Eloquent\Builder|CupomDesconto whereValorMinimoPedido($value)
 */
class CupomDesconto extends Model
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d';

    protected $dates = ['validade'];

    protected $fillable = [
        'qtd_uso_maxima', 'qtd_utilizado', 'validade', 'valor', 'valor_minimo_pedido'
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $codigo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscaCodigo($query, $codigo)
    {
        return $query->where('codigo', '=', $codigo);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeValido($query)
    {
        return $query->where('validade', '>=', Carbon::today())->whereRaw('qtd_utilizado < qtd_uso_maxima');
    }

    public function usado() {
        $this->qtd_utilizado++;
        $this->saveOrFail();
    }

    public function estorno() {
        $this->qtd_utilizado--;
        $this->saveOrFail();
    }
}
