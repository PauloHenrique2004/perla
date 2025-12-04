<?php

namespace App\Http\Controllers\Site;

//use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use App\Models\ProdutoCategoria;

class KitsController extends Controller
{
    public function index()
    {
        $categoria = ProdutoCategoria::where('slug', 'kits')->firstOrFail();

        $produtos = Produto::where('produto_categoria_id', $categoria->id)
            ->where('ativo', 1)
            ->orderBy('nome')
            ->paginate(12);

        return view('site.kits.index', compact('categoria', 'produtos'));
    }
}
