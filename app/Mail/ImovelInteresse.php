<?php

namespace App\Mail;

use App\Models\Imovel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ImovelInteresse extends Mailable
{
    use Queueable, SerializesModels;

    private $imovel;
    private $nome;
    private $telefone;
    private $email;
    private $descricao;

    /**
     * Create a new message instance.
     *
     * @param Imovel $imovel
     * @param $nome
     * @param $telefone
     * @param $email
     * @param $descricao
     */
    public function __construct(Imovel $imovel, $nome, $telefone, $email, $descricao)
    {
        $this->imovel = $imovel;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->descricao = $descricao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'emails.imovel_interesse',
            [
                'imovel' => $this->imovel,
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'descricao' => $this->descricao
            ]
        );
    }
}
