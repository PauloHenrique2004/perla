<?php

namespace App\Http\Controllers\Gestor\Produto;

use App\Http\Controllers\Gestor\Controller;
use App\Models\ProdutoDestaque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProdutosDestaqueController extends Controller
{
    public function index(Request $request)
    {
        $destaques = ProdutoDestaque::orderBy('ordem')
            ->orderByDesc('id')
            ->paginate(20);

        return view('gestor.produtos_destaque.index', compact('destaques'));
    }

    public function create()
    {
        return view('gestor.produtos_destaque.create', [
            'destaque' => new ProdutoDestaque(),
        ]);
    }

    public function store(Request $request)
    {
        $destaque = new ProdutoDestaque();

        $dados = $request->validate([
            'nome'  => 'required|string|max:255',
            'ordem' => 'nullable|integer|min:1',
            'ativo' => 'nullable|boolean',
        ]);

        $dados['ativo'] = $request->has('ativo') ? (bool)$request->get('ativo') : true;
        $dados['ordem'] = $dados['ordem'] ?? 1;

        $destaque->fill($dados);
        $destaque->save();

        Session::flash('notify', 'Seção de destaque cadastrada com sucesso.');
        return redirect()->route('gestor.produtos_destaque.index');
    }

    public function edit(ProdutoDestaque $destaque)
    {
        return view('gestor.produtos_destaque.edit', compact('destaque'));
    }

    public function update(Request $request, ProdutoDestaque $destaque)
    {
        $dados = $request->validate([
            'nome'  => 'required|string|max:255',
            'ordem' => 'nullable|integer|min:1',
            'ativo' => 'nullable|boolean',
        ]);

        $dados['ativo'] = $request->has('ativo') ? (bool)$request->get('ativo') : true;
        $dados['ordem'] = $dados['ordem'] ?? 1;

        $destaque->fill($dados);
        $destaque->save();

        Session::flash('notify', 'Seção de destaque atualizada com sucesso.');
        return redirect()->route('gestor.produtos_destaque.index');
    }

    public function destroy(ProdutoDestaque $destaque)
    {
        $destaque->delete();

        Session::flash('notify', 'Seção de destaque removida com sucesso.');
        return redirect()->route('gestor.produtos_destaque.index');
    }
}
