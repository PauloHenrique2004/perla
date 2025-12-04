<?php

namespace App\Http\Controllers\Site;

use App\Models\Pagina;

class PaginasController extends Controller
{
    public function show($slug, $id)
    {
        $pagina = Pagina::find($id);

        return view('site.paginas.show', compact('pagina'));
    }
}
