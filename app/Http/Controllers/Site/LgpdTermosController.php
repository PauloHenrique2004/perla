<?php

namespace App\Http\Controllers\Site;

use App\Models\LgpdTermo;

class LgpdTermosController extends Controller
{
    public function show()
    {
        $lgpdTermo = LgpdTermo::latest('id')->first();

        return view('site.lgpd_termos.show', compact('lgpdTermo'));
    }
}