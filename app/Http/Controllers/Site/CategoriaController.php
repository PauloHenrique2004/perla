<?php

namespace App\Http\Controllers\Site;

//use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use App\Models\ProdutoCategoria;

class CategoriaController extends Controller
{
    public function show($slug, $id)
    {
        $categoria = ProdutoCategoria::findOrFail($id);

        // opcional: garantir slug correto na URL
        if ($categoria->slug !== $slug) {
            return redirect()->route('categoria', [$categoria->slug, $categoria->id]);
        }

        $produtos = Produto::where('produto_categoria_id', $categoria->id)
            ->where('ativo', 1)
            ->orderBy('nome')
            ->paginate(12);

        return view('site.categoria.show', compact('categoria', 'produtos'));
    }
}
