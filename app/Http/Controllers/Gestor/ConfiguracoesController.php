<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Configuracao;
use App\Http\Requests\ConfiguracaoRequest;
use Illuminate\Support\Facades\Session;

class ConfiguracoesController extends Controller
{
    public function edit(Configuracao $configuracao)
    {
        return view('gestor.configuracoes.edit')->with('configuracao', $configuracao);
    }

//    public function update(ConfiguracaoRequest $request, Configuracao $configuracao)
//    {
//        $configuracao->fill($request->only($configuracao->getFillable()));
//
//        if($request->hasFile('logo')) {
//            $configuracao->logo = $request->file('logo')->store('public');
//        }
//
//        Session::flash('notify', 'Salvo com sucesso');
//
//        return redirect()->route('gestor.configuracoes.edit', 1);
//    }

    public function update(ConfiguracaoRequest $request, Configuracao $configuracao)
    {
        $configuracao->fill($request->only($configuracao->getFillable()));


        if($request->hasFile('logo'))
            $configuracao->logo = $request->file('logo')->store('storage_configuracoes');


        // Benefícios
        if ($request->hasFile('beneficio1')) {
            $configuracao->beneficio1 = $request->file('beneficio1')
                ->store('storage_configuracoes');
        }

        if ($request->hasFile('beneficio2')) {
            $configuracao->beneficio2 = $request->file('beneficio2')
                ->store('storage_configuracoes');
        }

        if ($request->hasFile('beneficio3')) {
            $configuracao->beneficio3 = $request->file('beneficio3')
                ->store('storage_configuracoes');
        }

        if ($request->hasFile('beneficio4')) {
            $configuracao->beneficio4 = $request->file('beneficio4')
                ->store('storage_configuracoes');
        }


        $configuracao->save();

        Session::flash('notify', 'Salvo com sucesso');

        return redirect()->route('gestor.configuracoes.edit', 1);
    }


}
