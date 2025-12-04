<?php

namespace App\Http\Controllers\Gestor;

use App\Models\CupomDesconto;

class CupomDescontosController extends Controller
{
    public function index()
    {
        $cupomDescontos = CupomDesconto::paginate(15);

        return view('gestor.cupom_descontos.index', compact('cupomDescontos'));
    }

    public function destroy(CupomDesconto $cupomDesconto)
    {
        $cupomDesconto->delete();
        return redirect()->route('gestor.cupom_descontos.index');
    }
}
