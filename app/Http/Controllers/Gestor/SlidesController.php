<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Pagina;
use App\Models\PaginaCategoria;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::ordenados()->paginate(15);

        return view('gestor.slides.index', compact('slides'));
    }

    public function livewire($id = null)
    {
        return view('gestor.slides.livewire')->with('id', $id);
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('gestor.slides.index');
    }
}
