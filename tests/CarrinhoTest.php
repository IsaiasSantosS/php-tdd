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

    public function testSeValoresDoProdutoDoCarrinhoConformePassado()
    {
        $produtoUm = new Produto();
        $produtoUm->setNome('Teste 1');
        $produtoUm->setPreco(19.5);
        $produtoUm->setSlug('produto-1');

        $carrinho = new Carrinho();

        $carrinho->addProduto($produtoUm);

        $this->assertEquals('Teste 1', $carrinho->getProdutos()[0]->getNome());
        $this->assertEquals(19.5, $carrinho->getProdutos()[0]->getPreco());
        $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testQuantidadeDeProdutosEValorTotalDoCarrinho()
    {
        $produtoUm = new Produto();
        $produtoUm->setNome('Teste 1');
        $produtoUm->setPreco(19.5);
        $produtoUm->setSlug('produto-1');

        $produtoDois = new Produto();
        $produtoDois->setNome('Teste 2');
        $produtoDois->setPreco(10);
        $produtoDois->setSlug('produto-2');

        $carrinho = new Carrinho();

        $carrinho->addProduto($produtoUm);
        $carrinho->addProduto($produtoDois);
        
        $this->assertEquals(2 , $carrinho->getQuantidadeProdutos());
        $this->assertEquals(29.5 , $carrinho->getValorTotalProdutos());
    }
}