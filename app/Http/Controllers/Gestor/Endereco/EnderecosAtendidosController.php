<?php

namespace App\Http\Controllers\Gestor\Endereco;

use App\Http\Controllers\Gestor\Controller;
use App\Models\Endereco\EnderecosAtendido;
use Illuminate\Http\Request;

class EnderecosAtendidosController extends Controller
{
    public function index()
    {
        $enderecosAtendidos = EnderecosAtendido::paginate(15);

        return view('gestor.endereco.enderecos_atendidos.index')->with(compact('enderecosAtendidos'));
    }

    public function destroy(EnderecosAtendido $enderecosAtendido)
    {
        $enderecosAtendido->delete();
        return redirect()->route('gestor.endereco.enderecos_atendidos.index');
    }
}
