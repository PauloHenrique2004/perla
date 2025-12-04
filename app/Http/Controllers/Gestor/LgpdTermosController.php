<?php

namespace App\Http\Controllers\Gestor;

use App\Models\LgpdTermo;

class LgpdTermosController extends Controller
{
    public function index()
    {
        $lgpdTermos = LgpdTermo::orderByDesc('id')->paginate(15);
        $lgpdTermoAtual = LgpdTermo::latest('id')->first();

        return view('gestor.lgpd_termos.index', compact('lgpdTermos', 'lgpdTermoAtual'));
    }

    public function livewire($id = null)
    {
        return view('gestor.lgpd_termos.livewire')->with('id', $id);
    }
}