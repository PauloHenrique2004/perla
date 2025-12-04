<?php

namespace App\Http\Livewire\Site\Produto\Traits;

trait PedidoDetalheTxtTrait
{
    /**
     * @param \App\Models\Pedido\Pedido $pedido
     * @param string $newLine
     * @param string $space
     * @return string
     */
    public function pedidoTxt($pedido, $newLine, $space)
    {
        $txt = '';

        $itemItems = $pedido->quantidade() == 0 ? 'Item' : 'Itens';

        $txt = $txt . "Novo Pedido ({$pedido->quantidade()}x {$itemItems})" . $newLine;
        $txt = $txt . "Identificador {$pedido->id}" . $newLine . $newLine;

        foreach ($pedido->produtos as $produto) {
            $txt = $txt . "{$produto->quantidade}x {$produto->nome}" . $newLine;

            if ($produto->preco_promocional && $produto->preco_promocional > 0)
                $preco = number_format($produto->preco_promocional, 2, ',', '.');
            else
                $preco = number_format($produto->preco, 2, ',', '.');
            $txt = $txt . "{$space}Preço R$ {$preco}" . $newLine;

            foreach ($produto->pedidoProdutoGrupos as $pedidoProdutoGrupo) {
                $txt = $txt . "{$space}{$space}{$space}{$pedidoProdutoGrupo->nome}" . $newLine;

                foreach ($pedidoProdutoGrupo->pedidoProdutoGrupoComplementos as $complemento) {
                    $preco = '';
                    if ($complemento->preco && $complemento->preco > 0) {
                        $preco = 'R$ ' . number_format($complemento->preco, 2, ',', '.');
                    }

                    $txt = $txt . "{$space}{$space}{$space}{$space}{$space}{$complemento->quantidade}x {$complemento->nome} {$preco}" . $newLine;
                }
            }

            $total = number_format($produto->total, 2, ',', '.');
            $txt = $txt . "Total R$ {$total}" . $newLine . $newLine;
        }

        $total = number_format($pedido->totalProdutos(), 2, ',', '.');
        $txt = $txt . "Total ({$pedido->quantidade()}x {$itemItems}) R$ {$total}" . $newLine;

        if ($pedido->formaEntrega && $pedido->clienteEndereco) {
            $valorEntrega = number_format($pedido->clienteEndereco->enderecoAtendido->valor, 2, ',', '.');
            $txt = $txt . "Valor da Entrega: R$ {$valorEntrega}" . $newLine;
        }

        if ($pedido->cupom_desconto_id) {
            $desconto = number_format($pedido->valor_desconto, 2, ',', '.');
            $txt = $txt . "Cupom {$pedido->cupomDesconto->codigo} R$ $desconto" . $newLine;
        }

        $total = number_format($pedido->valorAPagar(), 2, ',', '.');
        $txt = $txt . "Total à Pagar R$ {$total}" . $newLine;

        $total = number_format($pedido->valorAPagar(), 2, ',', '.');
        $txt = $txt . "{$pedido->formaPagamento->nome}" . $newLine . $newLine;

        if ($pedido->cliente_id) {
            $txt = $txt . "Cliente: {$pedido->cliente->name}" . $newLine;
            $txt = $txt . "Telefone(s): {$pedido->cliente->telefone}" . $newLine;
        } else
            $txt = $txt . "Cliente: Visitante" . $newLine . $newLine . $newLine;

        if ($pedido->formaEntrega) {
            $endereco = $pedido->clienteEndereco;
            $txt = $txt . "Forma de Entrega: {$pedido->formaEntrega->nome}" . $newLine;

            if ($endereco) {
                $enderecoAtendido = $endereco->enderecoAtendido;

                $txt = $txt . "{$endereco->endereco}, {$endereco->numero} {$endereco->complemento}, ";
                $txt = $txt . "{$enderecoAtendido->bairroNome()}, {$enderecoAtendido->municipio->nome()} / {$enderecoAtendido->uf}" . $newLine;
            }
        }

        return $txt;
    }
}

?>
