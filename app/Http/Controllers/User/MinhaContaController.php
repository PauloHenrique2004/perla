<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class MinhaContaController extends Controller
{
    public function edit()
    {
        $user = \Auth::user();
        return view('user.minha-conta.edit', compact('user'));
    }

    public function update(UserRequest $request)
    {
        /** @var User $user */
        $user = \Auth::user();

        $user->update($request->all());

        Session::flash('notify', 'Salvo com sucesso');

        return redirect()->route('user.minha-conta', 1);
    }
}
