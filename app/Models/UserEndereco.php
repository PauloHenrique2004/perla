<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserEndereco
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $cep
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereComplemento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|UserEndereco onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UserEndereco withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserEndereco withoutTrashed()
 * @property int $endereco_atendido_id
 * @property-read \App\Models\Endereco\EnderecosAtendido $enderecoAtendido
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereEnderecoAtendidoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco ativos()
 */
class UserEndereco extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'endereco_atendido_id', 'endereco', 'numero', 'complemento'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function enderecoAtendido()
    {
        return $this->belongsTo('App\Models\Endereco\EnderecosAtendido')->withTrashed();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAtivos($query)
    {
        return $query
            ->select('user_enderecos.*')
            ->join('enderecos_atendidos', 'user_enderecos.endereco_atendido_id', '=', 'enderecos_atendidos.id')
            ->whereNull('enderecos_atendidos.deleted_at');
    }
}
