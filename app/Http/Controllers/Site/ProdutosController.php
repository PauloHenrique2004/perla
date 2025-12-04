<?php

namespace App\Http\Controllers\Site;

use App\Models\Produto\Produto;

class ProdutosController extends Controller
{
    public function show($slug, $id)
    {
        $produto = Produto::ativos()->find($id);

        return view('site.produtos.show', compact('produto'));
    }

    public function lista(){
        return view('site.produtos.lista');
    }
}
