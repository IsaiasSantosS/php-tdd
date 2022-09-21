<?php

namespace Code;

class Carrinho
{
    private $produtos;

    public function addProduto(Produto $produto, Log $log = null)
    {
        $this->produtos[] = $produto;   
        if(!is_null($log))
            $log->log('Adicionando produto no carrinho');
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getQuantidadeProdutos()
    {
        return count($this->produtos);
    }

    public function getValorTotalProdutos()
    {
        return array_reduce($this->produtos, function ($total, $produto){
            $total += $produto->getPreco();
            return $total;
        }, 0);
    }

}