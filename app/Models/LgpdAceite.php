<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * App\Models\LgpdAceite
 *
 * @property int $id
 * @property int|null $lgpd_termos_id
 * @property string $ip
 * @property string|null $cookie
 * @property string|null $agente
 * @property string $aceito_em
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LgpdTermo $termo
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite query()
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereAceitoEm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereAgente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereCookie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereLgpdTermosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereUserId($value)
 * @property int $lgpd_termo_id
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite whereLgpdTermoId($value)
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite cookie($cookie)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite email($email)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite ip($ip)
 * @method static \Illuminate\Database\Eloquent\Builder|LgpdAceite versao($versao)
 */
class LgpdAceite extends Model
{
    protected $fillable = [
        'lgpd_termos_id', 'ip', 'cookie', 'agente', 'aceito_em'
    ];

    protected $dates = [
        'aceito_em'
    ];

    public function termo()
    {
        return $this->belongsTo('App\Models\LgpdTermo')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $versao
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVersao($query, $versao)
    {
        if($versao) {
            return $query->where('lgpd_termo_id', '=', $versao);
        }
        else
            return $query->where([]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $email
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEmail($query, $email)
    {
        if($email) {
            return $query->join('users', 'users.id', '=', 'lgpd_aceites.user_id')
                ->where('users.email', 'LIKE', "$email%");
        }
        else
            return $query->where([]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $cookie
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCookie($query, $cookie)
    {
        if($cookie) {
            return $query->where('cookie', '=', $cookie);
        }
        else
            return $query->where([]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $ip
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIp($query, $ip)
    {
        if($ip) {
            return $query->where('ip', '=', $ip);
        }
        else
            return $query->where([]);
    }

    public static function aceiteAtual()
    {
        $lgpdAceite = null;

        if (\Auth::user()) {
            // Se o cookie do usuário estiver com a versão da política de privacidade aceita
            if (self::aceiteAtualUsuarioAtualBuilder()->exists())
                $lgpdAceite = self::aceiteAtualUsuarioAtualBuilder()->first();
            else if (self::aceiteAtualBuilder()->exists()) {
                // Caso o usuário tenha aceitado o aviso avulso dos cookies e, se cadastre em seguida, precisamos vincular
                // o ID desse usuário neste aceite.

                // Obtém o aceite sem utilizar a chave estrangeira do usuário atual, somente utilizando o cookie
                $lgpdAceite = self::aceiteAtualBuilder()->first();

                // Então se esse usuário tiver o cookie aceito com a versão LGPD atual, vinculamos a sua chave estrangeira.
                if ($lgpdAceite) {
                    $lgpdAceite->user_id = \Auth::user()->id;
                    $lgpdAceite->saveOrFail();
                }
            } else if (self::usuarioAtualAceitouTermoAtual()) {
                // Considerando que, todos os usuários para terem uma conta precisam aceitar a política de privacidade;
                // se o usuário entrar na sua conta, e não tenha aceitado o aviso avulso, esse aviso deve ser aceito.
                $lgpdAceite = self::aceitarLgpd(\Auth::user()->id);
            }
        } else
            $lgpdAceite = self::aceiteAtualBuilder()->first();

        return $lgpdAceite;
    }

    // Verifica se o usuário autenticado aceitou a política de privacidade atual, sem a utilização de cookies,
    // ou seja, verifica somente na sua conta, independente do cookie/dispositivo.
    public static function usuarioAtualAceitouTermoAtual()
    {
        $lgpdTermo = LgpdTermo::latest('id')->first();
        return LgpdAceite::where(
            'lgpd_termo_id', '=', $lgpdTermo->id
        )->where(
            'user_id', '=', \Auth::user() ? \Auth::user()->id : null
        )->exists();
    }

    // Verifica se o usuário autenticado aceitou alguma política de privacidade anterior, sem a utilização de cookies
    // ou seja, verifica somente na sua conta, independente do cookie/dispositivo.
    public static function usuarioAtualAceitouAlgumTermoAnterior()
    {
        $lgpdTermo = LgpdTermo::latest('id')->first();
        return LgpdAceite::where(
            'lgpd_termo_id', '!=', $lgpdTermo->id
        )->where(
            'user_id', '=', \Auth::user() ? \Auth::user()->id : null
        )->exists();
    }

    // Aceita a política de privacidade atual
    public static function aceitar($userId = null)
    {
        $lgpdAceite = self::aceiteAtual();

        // Caso já tenha aceitado anteriormente, retornamos este aceite anterior, sem precisar duplicar.
        if ($lgpdAceite)
            return $lgpdAceite;
        else {
            return self::aceitarLgpd($userId);
        }
    }

    private static function aceitarLgpd($userId)
    {
        $lgpdTermo = LgpdTermo::latest('id')->first();

        $lgpdAceite = new LgpdAceite();
        $lgpdAceite->user_id = $userId;
        $lgpdAceite->lgpd_termo_id = $lgpdTermo->id;
        $lgpdAceite->aceito_em = Carbon::now();
        $lgpdAceite->cookie = Session::token();
        $lgpdAceite->ip = \Request::ip();
        $lgpdAceite->agente = \Request::userAgent();

        $lgpdAceite->saveOrFail();

        return $lgpdAceite;
    }

    // Não utilizar diretamente, sem saber o que faz!
    private static function aceiteAtualBuilder()
    {
        $lgpdTermo = LgpdTermo::latest('id')->first();

        return LgpdAceite::where(
            'cookie', '=', \Session::token()
        )->where(
            'lgpd_termo_id', '=', $lgpdTermo->id
        );
    }

    // Não utilizar diretamente, sem saber o que faz!
    private static function aceiteAtualUsuarioAtualBuilder()
    {
        return self::aceiteAtualBuilder()->where('user_id', '=', \Auth::user()->id);
    }
}