<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PaginaCategoria
 *
 * @property int $id
 * @property string $nome
 * @property int|null $categoria_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pagina[] $paginas
 * @property-read int|null $paginas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PaginaCategoria[] $subCategorias
 * @property-read int|null $sub_categorias_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria categorias()
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria masterCategorias()
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria newQuery()
 * @method static \Illuminate\Database\Query\Builder|PaginaCategoria onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaginaCategoria whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PaginaCategoria withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaginaCategoria withoutTrashed()
 * @mixin \Eloquent
 */
class PaginaCategoria extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMasterCategorias($query)
    {
        return $query->orWhereNull('categoria_id');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategorias($query)
    {
        return $query->orWhereNotNull('categoria_id');
    }

    public function subCategorias()
    {
        return $this->hasMany('App\Models\PaginaCategoria', 'categoria_id', 'id');
    }

    public function paginas()
    {
        return $this->hasMany('App\Models\Pagina', 'categoria_id', 'id');
    }
}
