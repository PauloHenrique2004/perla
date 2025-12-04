<?php

namespace App\Http\Controllers\Site;

use App\Models\Cardapio;
use App\Models\Slide;

class HorariosController extends Controller
{
    public function index($slug, $id)
    {
        $slides = Slide::ordenados()->get();
        $cardapios = Cardapio
            ::inRandomOrder()
            ->horarioId($id)
            ->doDia()
            ->get();

        return view('site.home.index', compact('slides', 'cardapios'));
    }
}
