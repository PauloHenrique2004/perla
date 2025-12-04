<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Pedido\Pedido;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::finalizados()
            ->filtroId(request()->input('id'))
            ->finalizadoEm(request()->input('finalizadoEmDe'), request()->input('finalizadoEmAte'))
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('gestor.pedidos.index', compact('pedidos'));
    }
}
