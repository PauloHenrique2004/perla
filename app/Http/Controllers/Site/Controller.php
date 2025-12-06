<?php

namespace App\Http\Controllers\Site;

use App\Models\Configuracao;
use App\Models\Horario;
use App\Models\Pagina;
use App\Models\Pedido\Pedido;
use App\Models\ProdutoCategoria;
use App\Util\Sessao\Sessao;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            View::share('configuracoes', Configuracao::first());

            View::share('lojaAberta', Horario::lojaAberta());

            View::share('pedidoAtual', Pedido::pedidoPendente(Sessao::id()));

            View::share('paginas', (object)[
                'sobre_nos' => Pagina::where('slug', 'sobre-nos')->first()
            ]);

            // categorias que devem aparecer no topo, já com subcategorias
            $menuCategorias = ProdutoCategoria::where('exibir_topo', 1)
                ->with(['subcategorias' => function ($q) {
                    $q->orderBy('ordem');
                }])
                ->orderBy('nome')
                ->get();

            // compartilha uma única coleção; o Blade decide como mostrar
            View::share('menuCategorias', $menuCategorias);

            return $next($request);
        });
    }
}
