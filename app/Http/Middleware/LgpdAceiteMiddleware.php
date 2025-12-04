<?php

namespace App\Http\Middleware;

use App\Models\LgpdAceite;
use Closure;
use Illuminate\Support\Facades\Auth;

class LgpdAceiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!str_contains(\Request::route()->uri, 'livewire')) {
            // Bloqueio para o usuário conseguir somente acessar a página dos termos de política de privacidade
            // se ele estiver autenticado, e não aceitou o termo atual, porém... aceitou algum outro termo anterior
            if (Auth::user() && !LgpdAceite::usuarioAtualAceitouTermoAtual() && LgpdAceite::usuarioAtualAceitouAlgumTermoAnterior()) {
                $rotaAtual = '/' . \Request::route()->uri;

                if ($rotaAtual != route('lgpd_termos', [], false)) {
                    return redirect()->route('lgpd_termos');
                }
            }
        }

        return $next($request);
    }
}