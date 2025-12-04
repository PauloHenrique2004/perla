<?php

namespace App\Http\Middleware;

use App\Models\UserEndereco;
use Closure;

class UsuarioEnderecoOwner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('meus_endereco');
        $endereco = UserEndereco::findOrFail($id, ['user_id']);

        if (\Auth::user()->id != $endereco->user_id)
            abort(403, 'Sem permissão!');

        return $next($request);
    }
}
