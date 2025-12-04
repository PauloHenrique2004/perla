<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Configuracao
 *
 * @property int $id
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $telefone1
 * @property string $telefone2
 * @property string $email1
 * @property string $email2
 * @property string $rua
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $horario_funcionamento
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao query()
 * @mixin \Eloquent
 * @property string|null $instagram
 * @property string|null $whatsapp_link
 * @property string|null $maps_iframe
 * @property string|null $google_analytics
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereGoogleAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereHorarioFuncionamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereMapsIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereRua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereTelefone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereTelefone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereWhatsappLink($value)
 * @property string|null $adicional
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereAdicional($value)
 */
class Configuracao extends Model
{
    protected $table = 'configuracoes';

    protected $fillable = [
        'facebook', 'twitter', 'whatsapp_link', 'instagram', 'maps_iframe', 'google_analytics',
        'telefone1', 'telefone2', 'email1', 'email2',
        'rua', 'bairro', 'cidade', 'estado', 'horario_funcionamento', 'logo', 'beneficio1', 'beneficio2', 'beneficio3', 'beneficio4'
    ];
}
