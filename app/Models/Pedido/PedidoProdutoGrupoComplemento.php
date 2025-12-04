<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pedido\PedidoProdutoGrupoComplemento
 *
 * @property int $id
 * @property int $pedido_produto_grupo_id
 * @property string $nome
 * @property string|null $descricao
 * @property string|null $preco
 * @property int $quantidade
 * @property-read \App\Models\Pedido\PedidoProdutoGrupo $pedidoProdutoGrupo
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento query()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento wherePedidoProdutoGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProdutoGrupoComplemento whereQuantidade($value)
 * @mixin \Eloquent
 */
class PedidoProdutoGrupoComplemento extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'pedido_produto_grupo_id', 'nome', 'descricao', 'preco', 'quantidade'
    ];

    public function pedidoProdutoGrupo()
    {
        return $this->belongsTo('App\Models\Pedido\PedidoProdutoGrupo');
    }
}
