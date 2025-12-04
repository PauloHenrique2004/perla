<?php

namespace App\Http\Controllers\Gestor;

use App\Models\LgpdAceite;
use Illuminate\Http\Request;

class LgpdAceitesController extends Controller
{
    public function index(Request $request)
    {
        $lgpdAceites = LgpdAceite::versao($request->get('versao'))
            ->email($request->get('email'))
            ->cookie($request->get('cookie'))
            ->ip($request->get('ip'))
            ->orderByDesc('lgpd_aceites.id')->paginate(15);

        return view('gestor.lgpd_aceites.index', compact('lgpdAceites'));
    }
}