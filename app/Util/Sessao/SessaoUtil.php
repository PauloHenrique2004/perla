<?php

namespace App\Util\Sessao;

use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class SessaoUtil
{
    public function id()
    {
        $sessao = Session::get('sessao');

        if (!$sessao) {
            $sessao = Uuid::uuid4();
            Session::put('sessao', $sessao);
            Session::save();
        }

        return $sessao;
    }
}
