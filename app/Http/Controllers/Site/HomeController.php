<?php

namespace App\Http\Controllers\Site;

use App\Models\Produto\Produto;
use App\Models\ProdutoCategoria;
use App\Models\Slide;
use App\Models\TopoBanner;
use App\Models\Depoimento;
use App\Models\ProdutoDestaque;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::ordenados()->get();

        $topoBanners = TopoBanner::where('ativo', true)
            ->orderBy('ordem')
            ->orderBy('id', 'desc')
            ->get();

        // até 3 seções de destaque, em ordem
        $destaquesHome = ProdutoDestaque::where('ativo', true)
            ->orderBy('ordem')
            ->orderBy('nome')
            ->take(3)
            ->get();

        // monta um array com seção + produtos
        $secoes = $destaquesHome->map(function ($secao) {
            $produtos = Produto::ativos()
                ->where('destaque_id', $secao->id)
                ->inRandomOrder()
                ->get();

            return [
                'secao'    => $secao,
                'produtos' => $produtos,
            ];
        });


        $categorias = ProdutoCategoria::where('exibir_topo', 0)->get();


        $depoimentos = Depoimento::where('ativo', true)
            ->orderBy('ordem')
            ->orderBy('id', 'desc')
            ->get();


        return view('site.home.index', compact(
            'slides',
            'topoBanners',
            'categorias',
            'secoes',
            'depoimentos'
        ));
    }

    public function categoria($slug, $id)
    {
        $slides = Slide::ordenados()->get();

        $produtos = Produto::ativos()->categoriaId($id)->get();

        $categorias = ProdutoCategoria::get();

        return view('site.home.index', compact('slides', 'produtos', 'categorias'));
    }

    public function promocoes()
    {
        $slides = Slide::ordenados()->get();

        $produtos = Produto::ativos()->promocionais()->get();

        $categorias = ProdutoCategoria::get();

        return view('site.home.index', compact('slides', 'produtos', 'categorias'));
    }
}
