<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Pagina;
use App\Models\PaginaCategoria;
use Illuminate\Support\Facades\DB;

class PaginasController extends Controller
{
    public function index()
    {
        $categorias = PaginaCategoria::masterCategorias()->select(['id', 'nome'])->get();

        $paginas = Pagina
            ::titulo(request()->input('titulo'))
            ->categoriaId(request()->input('categoria_id'))
            ->paginate(15);

        return view('gestor.paginas.index', compact('paginas', 'categorias'));
    }

    public function livewire($id = null)
    {
        return view('gestor.paginas.livewire')->with('id', $id);
    }

    public function destroy(Pagina $pagina)
    {
        $pagina->delete();
        return redirect()->route('gestor.paginas.index');
    }
}
