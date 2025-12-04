<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Produto\ProdutoGrupo
 *
 * @property int $id
 * @property int $produto_id
 * @property string $nome
 * @property int $tipo
 * @property int $quantidade_minima
 * @property int $quantidade_maxima
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produto\ProdutoGrupoComplemento[] $complementos
 * @property-read int|null $complementos_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereQuantidadeMaxima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereQuantidadeMinima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo produtoId($produtoId)
 * @property-read \App\Models\Produto\Produto $produto
 * @method static \Illuminate\Database\Query\Builder|ProdutoGrupo onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProdutoGrupo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProdutoGrupo withoutTrashed()
 * @property int|null $ordem
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo ordenados()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupo whereOrdem($value)
 */
class ProdutoGrupo extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                if($model->quantidade_minima < 0)
                    $model->quantidade_minima = 0;
                if($model->quantidade_maxima < 0)
                    $model->quantidade_maxima = 0;

                if ($model->quantidade_minima > $model->quantidade_maxima)
                    $model->quantidade_minima = $model->quantidade_maxima;

                if ($model->quantidade_maxima < $model->quantidade_minima)
                    $model->quantidade_maxima = $model->quantidade_minima;

                // Se Obrigatório
                if ($model->tipo == 2) {
                    if($model->quantidade_minima < 1)
                        $model->quantidade_minima = 1;
                    if($model->quantidade_maxima < 1)
                        $model->quantidade_maxima = 1;
                }
                //
                elseif ($model->tipo == 1) {
                    if($model->quantidade_maxima < $model->quantidade_minima)
                        $model->quantidade_maxima = $model->quantidade_minima;
                }
            }
        );
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto\Produto');
    }

    public function complementos()
    {
        return $this->hasMany('App\Models\Produto\ProdutoGrupoComplemento');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $produtoId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeProdutoId($query, $produtoId)
    {
        return $query->where('produto_id', '=', $produtoId);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC');
    }


    public function tipoNome()
    {
        if ($this->tipo == 1)
            return "Opcional";
        elseif ($this->tipo == 2)
            return "Obrigatório";
        else
            return "";
    }
}
