<?php

namespace App\Http\Controllers\Gestor\Produto;

use App\Http\Controllers\Gestor\Controller;
use App\Models\Produto\Produto;
use Illuminate\Http\JsonResponse;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(15);

        return view('gestor.produto.produtos.index')->with(compact('produtos'));
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('gestor.produto.produtos.index');
    }

}
