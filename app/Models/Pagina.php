<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Pagina
 *
 * @property int $id
 * @property int|null $categoria_id
 * @property string $titulo
 * @property string|null $slug
 * @property string|null $conteudo
 * @property string|null $foto
 * @property string|null $thumbnail
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PaginaCategoria|null $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina categoriaId($categoriaId)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina titulo($titulo)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereConteudo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pagina extends Model
{
    protected $fillable = [
        'categoria_id', 'titulo', 'slug', 'conteudo', 'foto', 'thumbnail'
    ];

    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                $model->slug = Str::slug($model->titulo, '-');
            }
        );
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $titulo
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTitulo($query, $titulo)
    {
        return $titulo ? $query->where('titulo', 'LIKE', "$titulo%") : $query->where([]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $categoriaId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoriaId($query, $categoriaId)
    {
        return $categoriaId ? $query->where('categoria_id', '=', $categoriaId) : $query->where([]);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\PaginaCategoria', 'categoria_id', 'id');
    }

    public function fotoUrl()
    {
        if (!empty($this->foto))
            return \Storage::disk('storage_paginas')->url($this->foto);
        return "/images/sem-foto.png";
    }

    public function thumbnailUrl()
    {
        if (!empty($this->thumbnail))
            return \Storage::disk('storage_paginas')->url($this->thumbnail);
        return "/images/sem-foto.png";
    }
}
