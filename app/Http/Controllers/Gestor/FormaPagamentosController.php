<?php

namespace App\Http\Controllers\Gestor;

use App\Models\FormaPagamento;

class FormaPagamentosController extends Controller
{
    public function index()
    {
        $formaPagamentos = FormaPagamento::buscaNome(request()->input('nome'))->paginate(15);

        return view('gestor.forma_pagamentos.index')->with(compact('formaPagamentos'));
    }

    public function livewire($id = null)
    {
        return view('gestor.forma_pagamentos.livewire')->with('id', $id);
    }

    public function destroy(FormaPagamento $formaPagamento)
    {
        $formaPagamento->delete();
        return redirect()->route('gestor.forma_pagamentos.index');
    }
}
