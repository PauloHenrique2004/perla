<?php

namespace App\Http\Controllers\Gestor;


use App\Models\TopoBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TopoBannerController extends Controller
{
    public function index(Request $request)
    {
        $topoBanners = TopoBanner::orderBy('ordem')->orderByDesc('id')->paginate(20);

        return view('gestor.topo_banners.index', compact('topoBanners'));
    }

    public function create()
    {
        return view('gestor.topo_banners.create', ['topoBanner' => new TopoBanner()]);
    }

    public function store(Request $request)
    {
        $topoBanner = new TopoBanner();

        $topoBanner->fill($request->only($topoBanner->getFillable()));

        if ($request->hasFile('imagem_desktop')) {
            $topoBanner->imagem_desktop = $request->file('imagem_desktop')->store('storage_topo_banners');
        }

        if ($request->hasFile('imagem_mobile')) {
            $topoBanner->imagem_mobile = $request->file('imagem_mobile')->store('storage_topo_banners');
        }
        $topoBanner->save();

        Session::flash('notify', 'Cadastrado com sucesso');
        return redirect()->route('gestor.topo_banners.index');
    }

    public function edit(TopoBanner $topoBanner)
    {
        return view('gestor.topo_banners.edit', compact('topoBanner'));
    }

    public function update(Request $request, TopoBanner $topoBanner)
    {
        $topoBanner->fill($request->only($topoBanner->getFillable()));

        if ($request->hasFile('imagem_desktop')) {
            $topoBanner->imagem_desktop = $request->file('imagem_desktop')->store('storage_topo_banners');
        }

        if ($request->hasFile('imagem_mobile')) {
            $topoBanner->imagem_mobile = $request->file('imagem_mobile')->store('storage_topo_banners');
        }


        $topoBanner->save();

        Session::flash('notify', 'Atualizado com sucesso');
        return redirect()->route('gestor.topo_banners.index');
    }

    public function destroy(TopoBanner $topoBanner)
    {
        $topoBanner->delete();
        Session::flash('notify', 'Removido com sucesso');
        return redirect()->route('gestor.topo_banners.index');
    }
}
