<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserEnderecoRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Session;

class MeusEnderecosController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = \Auth::user();
        $enderecos = $user->enderecos;

        return view('user.enderecos.index', compact('enderecos'));
    }

    public function create()
    {
        return view('user.enderecos.create', ['endereco' => new UserEndereco()]);
    }

    public function edit($request)
    {
        $endereco = UserEndereco::findOrFail($request);
        return view('user.enderecos.edit', compact('endereco'));
    }

    public function destroy($id)
    {
        /** @var User $user */
        $user = \Auth::user();

        if ($user->enderecos->count() == 1)
            Session::flash('error', 'Impossível apagar o único endereço');
        else
            UserEndereco::findOrFail($id)->delete();

        return redirect()->route('user.meus-enderecos.index', 1);
    }
}
