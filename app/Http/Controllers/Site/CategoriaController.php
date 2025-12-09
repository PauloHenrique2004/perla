<?php

namespace App\Http\Controllers\Site;

//use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use App\Models\ProdutoCategoria;
use App\Models\ProdutoSubCategoria;

class CategoriaController extends Controller
{
    public function show($slug, $id)
    {
        $categoria = ProdutoCategoria::findOrFail($id);

        if ($categoria->slug !== $slug) {
            return redirect()->route('categoria', [$categoria->slug, $categoria->id]);
        }

        $produtos = Produto::where('produto_categoria_id', $categoria->id)
            ->where('ativo', 1)
            ->orderBy('nome')
            ->paginate(12);

        return view('site.categoria.show', [
            'categoria'    => $categoria,
            'produtos'     => $produtos,
            'tituloPagina' => $categoria->nome,
        ]);
    }

    public function showSubcategoria($slug, $id)
    {
        $sub = ProdutoSubCategoria::findOrFail($id);

        $slugCorreto = \Str::slug($sub->produto_subcategoria);
        if ($slugCorreto !== $slug) {
            return redirect()->route('subcategoria', [$slugCorreto, $sub->id]);
        }

        $produtos = Produto::where('produto_subcategoria_id', $sub->id)
            ->where('ativo', 1)
            ->orderBy('nome')
            ->paginate(12);

        // reaproveita a mesma view, só muda título e “categoria” exibida
        return view('site.categoria.show', [
            'categoria'    => $sub, // só para não quebrar onde usa $categoria->nome
            'produtos'     => $produtos,
            'tituloPagina' => $sub->produto_subcategoria,
        ]);
    }
}

