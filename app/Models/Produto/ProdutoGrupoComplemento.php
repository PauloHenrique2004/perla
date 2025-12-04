<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Produto\ProdutoGrupoComplemento
 *
 * @property int $id
 * @property int $produto_grupo_id
 * @property string $nome
 * @property string|null $descricao
 * @property string $preco
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produto\ProdutoGrupo $grupo
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereProdutoGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoGrupoComplemento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProdutoGrupoComplemento extends Model
{
    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                if($model->preco == 0)
                    $model->preco = null;
            }
        );
    }

    public function grupo() {
        return $this->belongsTo('App\Models\Produto\ProdutoGrupo');
    }
}
