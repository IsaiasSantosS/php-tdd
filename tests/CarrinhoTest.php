<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testSeClasseCarrinhoExiste()
    {
        $classe = class_exists('\\Code\\Carrinho');
        $this->assertTrue($classe);
    }

    public function testAdicionarProdutosNoCarrinho()
    {
        $produtoUm = new Produto();
        $produtoUm->setNome('Teste 1');
        $produtoUm->setPreco(19.5);
        $produtoUm->setSlug('produto-1');

        $produtoDois = new Produto();
        $produtoDois->setNome('Teste 2');
        $produtoDois->setPreco(10.5);
        $produtoDois->setSlug('produto-2');

        $carrinho = new Carrinho();

        $carrinho->addProduto($produtoUm);
        $carrinho->addProduto($produtoDois);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);
    }
}