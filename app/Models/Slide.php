<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slide
 *
 * @property int $id
 * @property int $ordem
 * @property string $tag
 * @property string $titulo
 * @property string $subtitulo
 * @property string $link
 * @property string|null $foto
 * @property string|null $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide ordenados()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereOrdem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereSubtitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $promocional
 * @method static \Illuminate\Database\Eloquent\Builder|Slide wherePromocional($value)
 */
class Slide extends Model
{
    const STORAGE = "storage_slides";

    protected $fillable = [
        'titulo', 'ordem', 'promocional', 'link', 'foto'
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC');
    }

    public function fotoUrl()
    {
        if (!empty($this->foto))
            return \Storage::disk(self::STORAGE)->url($this->foto);
        return "/images/sem-foto.png";
    }
}
