<?php

namespace App\Http\Controllers\Gestor\Endereco;

use App\Http\Controllers\Gestor\Controller;
use App\Models\Endereco\MunicipiosAtendido;

class MunicipiosAtendidosController extends Controller
{
    public function index()
    {
        $municipiosAtendidos = MunicipiosAtendido::paginate(15);

        return view('gestor.endereco.municipios_atendidos.index')->with(compact('municipiosAtendidos'));
    }

    public function destroy(MunicipiosAtendido $municipiosAtendido)
    {
        $municipiosAtendido->delete();
        return redirect()->route('gestor.endereco.municipios_atendidos.index');
    }
}
