<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pedido\PedidoProduto
 *
 * @property int $id
 * @property int $pedido_id
 * @property int $produto_id
 * @property string $nome
 * @property string $preco
 * @property string|null $preco_promocional
 * @property int $quantidade
 * @property string $total
 * @property-read \App\Models\Pedido\Pedido $pedido
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto query()
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto wherePedidoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto wherePrecoPromocional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PedidoProduto whereTotal($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pedido\PedidoProdutoGrupo[] $pedidoProdutoGrupos
 * @property-read int|null $pedido_produto_grupos_count
 * @property-read \App\Models\Produto\Produto $produto
 */
class PedidoProduto extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'pedido_id', 'produto_id', 'nome', 'preco', 'preco_promocional',
        'quantidade', 'total'
    ];

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido\Pedido');
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto\Produto')->withTrashed();
    }

    public function pedidoProdutoGrupos()
    {
        return $this->hasMany('App\Models\Pedido\PedidoProdutoGrupo');
    }

    public function totalComplementos()
    {
        return $this->pedidoProdutoGrupos->sum('total');
    }

    public function alterarQuantidade($quantidade)
    {
        if ($quantidade <= 0)
            return;

        $this->total = $this->preco_promocional ? $this->preco_promocional : $this->preco;
        $this->total += $this->totalComplementos();
        $this->total *= $quantidade;

        $this->quantidade = $quantidade;

        $this->saveOrFail();
    }
}
