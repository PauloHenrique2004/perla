<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pedido\PedidoProdutoGrupo
 *
 * @property int $id
 * @property int $pedido_produto_id
 * @property string $nome
 * @property string $total
 * @property-read \App\Models\Pedido\PedidoProduto $pedidoProduto
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo query()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo wherePedidoProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupo whereTotal($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pedido\PedidoProdutoGrupoComplemento[] $pedidoProdutoGrupoComplementos
 * @property-read int|null $pedido_produto_grupo_complementos_count
 */
class PedidoProdutoGrupo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'pedido_produto_id', 'nome', 'total'
    ];

    public function pedidoProduto()
    {
        return $this->belongsTo('App\Models\Pedido\PedidoProduto');
    }

    public function pedidoProdutoGrupoComplementos()
    {
        return $this->hasMany('App\Models\Pedido\PedidoProdutoGrupoComplemento');
    }
}
