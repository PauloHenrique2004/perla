<?php

namespace App\Models\Produto;

use App\Models\ProdutoDestaque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Produto\Produto
 *
 * @property int $id
 * @property int $produto_categoria_id
 * @property string $nome
 * @property string $slug
 * @property string|null $descricao
 * @property string $preco
 * @property int $promocional
 * @property string|null $preco_promocional
 * @property string $foto
 * @property string $thumbnail
 * @property int $ativo
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produto\ProdutoGrupo[] $grupos
 * @property-read int|null $grupos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto nome($nome)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePrecoPromocional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereProdutoCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePromocional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $preco_a_partir_de
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePrecoAPartirDe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto categoriaId($categoriaId)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto promocionais()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto ativos()
 * @method static \Illuminate\Database\Query\Builder|Produto onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Produto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Produto withoutTrashed()
 */
class Produto extends Model
{
    use SoftDeletes;

    const STORAGE = "storage_produtos";

    public $destaquesHome = [];

    protected $fillable = [
        'produto_categoria_id', 'nome', 'slug', 'descricao',
        'preco', 'preco_a_partir_de', 'promocional', 'preco_promocional', 'foto', 'thumbnail', 'ativo', 'destaque_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                if (!$model->promocional)
                    $model->preco_promocional = null;

                if ($model->preco_a_partir_de && $model->preco_a_partir_de == 0)
                    $model->preco_a_partir_de = null;

                $model->slug = \Str::slug($model->nome, '-');
            }
        );
    }

    public function grupos()
    {
        return $this->hasMany('App\Models\Produto\ProdutoGrupo')->ordenados();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $nome
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNome($query, $nome)
    {
        return $nome ? $query->where('nome', 'LIKE', "%$nome%") : $query->where([]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $categoriaId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoriaId($query, $categoriaId)
    {
        return $query->where('produto_categoria_id', '=', $categoriaId);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePromocionais($query)
    {
        return $query->where('promocional', '=', true);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAtivos($query)
    {
        return $query->where('ativo', '=', true);
    }

    public function ehAtivo()
    {
        if ($this->trashed() || !$this->ativo)
            return false;

        return true;
    }

    public function fotoUrl()
    {
        if (!empty($this->foto))
            return \Storage::disk(self::STORAGE)->url($this->foto);
        return "/images/sem-foto.png";
    }

    public function thumbnailUrl()
    {
        if (!empty($this->thumbnail))
            return \Storage::disk(self::STORAGE)->url($this->thumbnail);
        return "/images/sem-foto.png";
    }

    public function mount($id = null)
    {
        $this->destaquesHome = ProdutoDestaque::ativosOrdenados()->get();
    }

    public function imagens()
    {
        return $this->hasMany(\App\Models\ProdutoImagem::class);
    }
}
