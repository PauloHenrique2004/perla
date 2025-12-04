<?php

namespace App\Http\Controllers\Gestor;

use App\Models\FormaEntrega;

class FormaEntregasController extends Controller
{
    public function index()
    {
        $formaEntregas = FormaEntrega::buscaNome(request()->input('nome'))->paginate(15);

        return view('gestor.forma_entregas.index')->with(compact('formaEntregas'));
    }

    public function livewire($id = null)
    {
        return view('gestor.forma_entregas.livewire')->with('id', $id);
    }

    public function destroy(FormaEntrega $formaEntrega)
    {
        $formaEntrega->delete();
        return redirect()->route('gestor.forma_entregas.index');
    }
}
