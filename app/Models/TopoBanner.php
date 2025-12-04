<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TopoBanner extends Model
{


    protected $table = 'topo_banners';

    protected $fillable = [
        'titulo',
        'imagem_desktop',
        'imagem_mobile',
        'link',
        'ativo',
        'ordem',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'ordem' => 'integer',
    ];
}
