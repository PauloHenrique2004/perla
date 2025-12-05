<?php

namespace App\Http\Controllers\Gestor;

use App\Models\ProdutoCategoria;

class ProdutoCategoriasController extends Controller
{
    public function index()
    {
//        $produto_categorias = ProdutoCategoria::ordenados()->paginate(15);

        $produto_categorias = ProdutoCategoria::ordenados()
            ->whereNull('menu_grupo')
            ->whereNotIn('id', [18, 19, 20, 21, 22, 23, 25])
            ->paginate(15);



        return view('gestor.produto_categorias.index', compact('produto_categorias'));
    }

    public function livewire($id = null)
    {
        return view('gestor.produto_categorias.livewire')->with('id', $id);
    }

    public function destroy(ProdutoCategoria $produtoCategoria)
    {
        $produtoCategoria->delete();
        return redirect()->route('gestor.produto_categorias.index');
    }
}
