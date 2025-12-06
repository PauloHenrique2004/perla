<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProdutoCategoria
 *
 * @property int $id
 * @property string $nome
 * @property string $slug
 * @property string $icone
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria ordenados()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereIcone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoCategoria whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|ProdutoCategoria onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProdutoCategoria withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProdutoCategoria withoutTrashed()
 */
class ProdutoCategoria extends Model
{
    const STORAGE = "storage_produto_categorias";

    use SoftDeletes;

    protected $fillable = [
        'nome', 'slug', 'icone', 'exibir_topo'
    ];

    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                $model->slug = \Str::slug($model->nome, '-');
            }
        );
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenados($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function iconeUrl()
    {
        if (!empty($this->icone))
            return \Storage::disk(self::STORAGE)->url($this->icone);
        return "/images/sem-foto.png";
    }

    public function subcategorias()
    {
        return $this->hasMany(\App\Models\ProdutoSubCategoria::class, 'produto_categoria_id');
    }

}
