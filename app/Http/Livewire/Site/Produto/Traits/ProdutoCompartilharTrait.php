<?php

namespace  App\Http\Livewire\Site\Produto\Traits;

trait ProdutoCompartilharTrait
{
    public $compartilharUrl = [];

    private function setCompartilharUrl()
    {
        $urlAtual = $this->urlAtual();
        $produtoNome = $this->produto->nome;

        $this->compartilharUrl = [
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$urlAtual}",
            'whatsapp' => "https://api.whatsapp.com/send?text={$produtoNome}%0a%0a{$urlAtual}",
            'telegram' => "https://t.me/share/url?url={$urlAtual}&text={$produtoNome}"
        ];
    }

    private function urlAtual()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
}
