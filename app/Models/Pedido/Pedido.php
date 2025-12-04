<?php

namespace App\Models\Pedido;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pedido\Pedido
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $cliente_endereco_id
 * @property int $forma_entrega_id
 * @property int $cupom_desconto_id
 * @property string|null $valor_desconto
 * @property string|null $valor_entrega
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $cliente
 * @property-read \App\Models\UserEndereco $clienteEndereco
 * @property-read \App\Models\CupomDesconto $cupomDesconto
 * @property-read \App\Models\FormaEntrega $formaEntrega
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pedido\PedidoProduto[] $produtos
 * @property-read int|null $produtos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereClienteEnderecoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereCupomDescontoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereFormaEntregaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereValorDesconto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereValorEntrega($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido pendentes()
 * @property string|null $session
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido session($session)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereSession($value)
 * @property-read \App\Models\FormaPagamento $formaPagamento
 * @property int|null $forma_pagamento_id
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereFormaPagamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido finalizados()
 * @property \Illuminate\Support\Carbon|null $finalizado_em
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido finalizadoEm($de, $ate)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereFinalizadoEm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido id($id)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido filtroId($id)
 */
class Pedido extends Model
{
    protected $fillable = [
        'session', 'cliente_id', 'cliente_endereco_id', 'forma_entrega_id', 'cupom_desconto_id', 'valor_desconto',
        'valor_entrega', 'status', 'forma_pagamento_id', 'finalizado_em'
    ];

    protected $dates = [
        'finalizado_em'
    ];

    public static function boot()
    {
        parent::boot();

        self::saving(
            function ($model) {
                if ($model->status == 1)
                    $model->finalizado_em = null;
                elseif ($model->status == 2)
                    $model->finalizado_em = Carbon::now();
            }
        );
    }

    public static function pedidoPendente($session): Pedido
    {
        $pedidoPendente = self::pendentes()->session($session)->first();

        if ($pedidoPendente)
            return $pedidoPendente;
        else {
            return self::create(['session' => $session]);
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFiltroId($query, $id)
    {
        if (!$id)
            return $query->where([]);

        return $query->where('id', '=', $id);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $de
     * @param mixed $ate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFinalizadoEm($query, $de, $ate)
    {
        if (!$de && !$ate)
            return $query->where([]);

        if ($de && !$ate)
            return $query->where('finalizado_em', '>=', $de . ' 00:00:00');
        elseif ($ate && !$de)
            return $query->where('finalizado_em', '<=', $ate . ' 23:59:59');
        else
            return $query->whereBetween('finalizado_em', [$de . ' 00:00:00', $ate . ' 23:59:59']);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePendentes($query)
    {
        return $query->where('status', '=', "1");
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFinalizados($query)
    {
        return $query->where('status', '=', "2");
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $session
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSession($query, $session)
    {
        return $query->where('session', '=', $session);
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function clienteEndereco()
    {
        return $this->belongsTo('App\Models\UserEndereco');
    }

    public function formaEntrega()
    {
        return $this->belongsTo('App\Models\FormaEntrega');
    }

    public function cupomDesconto()
    {
        return $this->belongsTo('App\Models\CupomDesconto')->withTrashed();
    }

    public function produtos()
    {
        return $this->hasMany('App\Models\Pedido\PedidoProduto');
    }

    public function formaPagamento()
    {
        return $this->belongsTo('App\Models\FormaPagamento');
    }

    public function quantidade()
    {
        return $this->produtos->sum('quantidade');
    }

    public function totalProdutos()
    {
        return $this->produtos->sum('total');
    }

    public function valorAPagar()
    {
        $total = 0.0;

        $total += $this->totalProdutos();

        if ($this->valor_entrega)
            $total += $this->valor_entrega;

        if ($this->valor_desconto)
            $total -= $this->valor_desconto;

        return $total;
    }
}
