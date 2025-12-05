<?php

namespace App\Http\Controllers\User;

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
        View::share('configuracoes', Configuracao::first());

        View::share('lojaAberta', Horario::lojaAberta());

        View::share('pedidoAtual', Pedido::pedidoPendente(Sessao::id()));

        View::share('paginas', (object)[
            'sobre_nos' => Pagina::where('slug', 'sobre-nos')->first()
        ]);

        // categorias usadas no menu (onde menu_grupo não é nulo)
        $categoriasMenu = ProdutoCategoria::whereNotNull('menu_grupo')->get();

        View::share('menuKits',     $categoriasMenu->where('menu_grupo', 'kits'));
        View::share('menuLinhas',   $categoriasMenu->where('menu_grupo', 'linhas'));
        View::share('menuProdutos', $categoriasMenu->where('menu_grupo', 'produtos'));
        View::share('menuCabelos',  $categoriasMenu->where('menu_grupo', 'cabelos'));
    }
}
