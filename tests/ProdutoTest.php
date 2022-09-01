<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $produto;

    /*
    * Executar antes de cada teste
    */
    public function setUp()
    {
        $this->produto = new Produto;
    }

    /*
    * Executar depois de cada teste
    */
    public function tearDown()
    {
        unset($this->produto);
    }

    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setNome('Produto 1');

        $this->assertEquals('Produto 1', $produto->getNome(), 'Nomes não são iguais');
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setPreco('1354.04');

        $this->assertEquals('1354.04', $produto->getPreco(), 'Preços não são iguais');
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setSlug('produto-1');

        $this->assertEquals('produto-1', $produto->getSlug(), 'Slugs não são iguais');
    }
}
