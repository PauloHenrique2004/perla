<?php

namespace App\Http\Controllers\Gestor\Produto;

use App\Http\Controllers\Gestor\Controller;
use App\Models\Produto\Produto;
use App\Models\Produto\ProdutoGrupo;

class ProdutoGruposController extends Controller
{
    public function index(Produto $produto)
    {
        $grupos = ProdutoGrupo::ordenados()->produtoId($produto->id)->paginate(15);

        return view('gestor.produto.produto_grupos.index')->with(compact('produto', 'grupos'));
    }

    public function destroy(ProdutoGrupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('gestor.produto.produto_grupos.index', $grupo->produto_id);
    }
}
