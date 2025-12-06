<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoSubCategoria extends Model
{
//    use HasFactory;

    protected $table = 'produto_subcategorias';

    protected $fillable = [
        'produto_categoria_id',
        'produto_subcategoria',
        'ordem',
    ];

    public function categoria()
    {
        return $this->belongsTo(ProdutoCategoria::class, 'produto_categoria_id');
    }
}
