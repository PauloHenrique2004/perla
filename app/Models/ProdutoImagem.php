<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    protected $fillable = [
        'produto_id',
        'imagem',
    ];

    protected $table = 'produto_imagens';

    public function produto()
    {
        return $this->belongsTo('App\Models\Imovel');
    }
}
