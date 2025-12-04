<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoDestaque extends Model
{
    protected $table = 'produto_destaques';

    protected $fillable = [
        'nome',
        'ordem',
        'ativo',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'destaque_id');
    }

    // escopo para ativos em ordem
    public function scopeAtivosOrdenados($query)
    {
        return $query->where('ativo', true)
            ->orderBy('ordem')
            ->orderBy('nome');
    }
}
