<?php

namespace App\Http\Controllers\Gestor;

//use App\Http\Controllers\Controller;
use App\Models\Depoimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepoimentosController extends Controller
{
    public function index(Request $request)
    {
        $depoimentos = Depoimento::orderBy('ordem')
            ->orderByDesc('id')
            ->paginate(20);

        return view('gestor.depoimentos.index', compact('depoimentos'));
    }

    public function create()
    {
        return view('gestor.depoimentos.create', [
            'depoimento' => new Depoimento(),
        ]);
    }

    public function store(Request $request)
    {
        $depoimento = new Depoimento();

        $depoimento->fill($request->only($depoimento->getFillable()));

        if ($request->hasFile('foto')) {
            $depoimento->foto = $request->file('foto')->store('storage_depoimentos');
        }

        $depoimento->save();

        Session::flash('notify', 'Depoimento cadastrado com sucesso');
        return redirect()->route('gestor.depoimentos.index');
    }

    public function edit(Depoimento $depoimento)
    {
        return view('gestor.depoimentos.edit', compact('depoimento'));
    }

    public function update(Request $request, Depoimento $depoimento)
    {
        $depoimento->fill($request->only($depoimento->getFillable()));

        if ($request->hasFile('foto')) {
            $depoimento->foto = $request->file('foto')->store('storage_depoimentos');
        }

        $depoimento->save();

        Session::flash('notify', 'Depoimento atualizado com sucesso');
        return redirect()->route('gestor.depoimentos.index');
    }

    public function destroy(Depoimento $depoimento)
    {
        $depoimento->delete();

        Session::flash('notify', 'Depoimento removido com sucesso');
        return redirect()->route('gestor.depoimentos.index');
    }
}
