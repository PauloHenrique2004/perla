<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Horario;

class HorariosController extends Controller
{
    public function index()
    {
        $horarios = Horario::nome(request()->input('nome'))->paginate(15);

        return view('gestor.horarios.index')->with(compact('horarios'));
    }

    public function livewire($id = null)
    {
        return view('gestor.horarios.livewire')->with('id', $id);
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('gestor.horarios.index');
    }
}
