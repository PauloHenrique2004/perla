<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Gestor;

class GestoresController extends Controller
{
    public function index()
    {
        $gestores = Gestor::paginate(15);
        return view('gestor.gestores.index', compact('gestores'));
    }

    public function livewire($id = null)
    {
        return view('gestor.gestores.livewire')->with('id', $id);
    }

    public function destroy(Gestor $gestor)
    {
        $gestor->delete();
        return redirect()->route('gestor.gestores.index');
    }
}
