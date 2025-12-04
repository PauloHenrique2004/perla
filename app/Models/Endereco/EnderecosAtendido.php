<?php

namespace App\Models\Endereco;

use App\Models\Endereco\Dne\Localidade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * App\Models\Endereco\EnderecosAtendido
 *
 * @property int $id
 * @property string $uf
 * @property int $loc_num
 * @property string $valor
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserEndereco[] $userEnderecos
 * @property-read int|null $user_enderecos_count
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido query()
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereLocNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereLogNu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereValor($value)
 * @mixin \Eloquent
 * @property int $loc_nu
 * @property string|null $bairro_custom
 * @property int|null $bai_nu
 * @method static \Illuminate\Database\Query\Builder|EnderecosAtendido onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereBaiNu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereBairroCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnderecosAtendido whereLocNu($value)
 * @method static \Illuminate\Database\Query\Builder|EnderecosAtendido withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EnderecosAtendido withoutTrashed()
 * @property-read \App\Models\Endereco\Dne\Localidade $municipio
 * @property-read \App\Models\Endereco\Dne\Bairro $dneBairro
 */
class EnderecosAtendido extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uf', 'loc_nu', 'bairro_custom', 'bai_nu', 'valor'
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Models\Endereco\Dne\Localidade', 'loc_nu', 'LOC_NU');
    }

    public static function municipios() {
        $ids = self::all()->unique('loc_nu')->pluck('loc_nu');
        return Localidade::whereIn('LOC_NU', $ids);
    }

    public function bairroNome()
    {
        if ($this->bai_nu)
            return $this->dneBairro->nome();
        else
            return $this->bairro_custom;
    }

    public function userEnderecos()
    {
        return $this->hasMany('App\Models\UserEndereco')->withTrashed();
    }

    public function ehAtivo()
    {
        if ($this->trashed())
            return false;

        return true;
    }

    public function dneBairro()
    {
        return $this->belongsTo('App\Models\Endereco\Dne\Bairro', 'bai_nu', 'BAI_NU');
    }

    public function uuid()
    {
        return (string)Str::uuid();
    }
}
